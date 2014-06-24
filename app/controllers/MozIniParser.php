<?php

class MozIniparser extends BaseParser
{

    var $currentComments = array();
    var $Done = false;
    var $position = 0;
    public $result;

    function __construct()
    {
        parent::__construct();
    }

    public function Parse($filename, $pluralCount = 2, $sdk = 0)
    {
        unset($this->result);
        if (empty($filename)) {
            throw new \Exception('MozIniParser: File not defined.');
        } elseif (file_exists($filename) === false) {
            throw new \Exception('MozIniParser: File does not exists: "' . htmlspecialchars($filename) . '"');
        } elseif (is_readable($filename) === false) {
            throw new \Exception('MozIniParser: File is not readable: "' . htmlspecialchars($filename) . '"');
        }

        $iniStr = file_get_contents($filename);
        $lines = explode("\n", $iniStr);

        foreach ($lines as $line) {
            $line = trim($line);
            // check for comments
            if (!$line || $line[0] == "#" || $line[0] == ";") {
                $this->currentComments[] = $line;
                continue;
            }
            // ignore other lines
            if (!strpos($line, '=')) {
                continue;
            }
            $objEntity = new FileEntity();
            $tmp = explode("=", $line, 2);
            $key = rtrim($tmp[0]);
            $value = ltrim($tmp[1]);
            preg_match("/^(.*)\[(zero|one|two|few|many|other)\]$/", trim($tmp[0]), $matches);
            if ($matches) {
                $ret[$matches[1]][$matches[2]] = $value;
                // It's possible to omit [other] plural, so we check again
                // if we already have an entity with that name and reload it
                $checkKey = trim($matches[1]);
                if ($this->result[$checkKey]) {
                    $objEntity = $this->result[$checkKey];
                    if (!isset($objEntity->reference)) {
                        $objEntity->reference = $objEntity->one;
                    }
                    $objEntity->Key = $matches[1];
                    $objEntity->{$matches[2]} = $value;
                    $objEntity->pluraltype = 'cldr';
                    continue;
                } else {
                    $objEntity->Key = $matches[1];
                    $objEntity->{$matches[2]} = $value;
                    $objEntity->pluraltype = 'cldr';
                    $objEntity->comment = join("\n", $this->currentComments);
                    unset($this->currentComments);
                    $this->result[$objEntity->Key] = $objEntity;
                    continue;
                }
            } else {
                $alreadyExists = false;
                $checkKey = trim($matches[1]);
                if ($this->result[$checkKey]) {
                    $objEntity = $this->result[$checkKey];
                    $alreadyExists = true;
                }
                if (!$alreadyExists) {
                    // https://developer.mozilla.org/en-US/docs/Localization_and_Plurals
                    // That's reason why we have to check for plural again
                    $plurals = $this->checkPlurales($value, $pluralCount);
                    if ($plurals) {
                        $objEntity->one = trim($plurals[0]);
                        $objEntity->other = trim($plurals[1]);
                        $objEntity->two = trim($plurals[2]);
                        $objEntity->few = trim($plurals[3]);
                        $objEntity->many = trim($plurals[4]);
                        $objEntity->zero = trim($plurals[5]);
                        $objEntity->pluraltype = 'gettext';
                        $objEntity->comment = join("\n", $this->currentComments);
                        $objEntity->Key = $key;
                        $objEntity->context = $key;
                        unset($this->currentComments);
                    } else {
                        $objEntity->one = $value;
                        $objEntity->context = $key;
                        $objEntity->Key = $key;
                        $objEntity->comment = join("\n", $this->currentComments);
                        unset($this->currentComments);
                    }
                }
            }
            if ($objEntity instanceof FileEntity) {
                //print_r($objEntity);
                $this->result[$objEntity->Key] = $objEntity;
            }
        }
        //$this->sections = array_keys($ret);
        return $this->result;
    }

    public function Export($project_id, $strTemplateFile, $language, $type = null)
    {
        $type = 1;
        $PluralRules = WtsHelper::getRule($language);
        if (!$PluralRules) {
            $lang = substr($language, 0, 2);
            $PluralRules = WtsHelper::getRule($lang);
        }
        $project = Project::find($project_id);
        $uploadpath = $this->config['app.uploadFolder'] . $project->user_id . '/' . $project->path;

        $path = str_replace($uploadpath, '', $strTemplateFile);

        $Originalfile = originalFiles::where('file_path', '=', $path)
            ->where('project_id', '=', $project->project_id)
            ->first();
        $strTemplateContentsA = file_get_contents($uploadpath . $strTemplateFile);
        $strTemplateContentsArray = file($uploadpath . $strTemplateFile);
        if (!$strTemplateContentsA) {

        }
        foreach ($strTemplateContentsArray as $val) {
            $p = explode('=', $val);
            $strTemplateContentsArrayB[$p[0]] = $val;
        }
        $pluralStrings = originalStrings::where('project_id', '=', $project->project_id)
            ->where('file_id', '=', $Originalfile->file_id)
            ->where('plural_type', '!=', '')
            ->get();
        $allPlurals = array('one', 'two', 'few', 'many', 'other', 'zero');
        foreach ($pluralStrings as $cldr) {

            $required = array_keys($PluralRules);
            foreach ($required as $key => $req) {
                $found = array_key_exists($cldr->context . '[' . $req . ']', $strTemplateContentsArrayB);
                if ($found) {
                    //echo "<b>$key found: $req</b><br>";
                } else {
                    $ctx = $required[$key - 1];
                    $pos = array_search($cldr->context . '[' . $ctx . ']', array_keys($strTemplateContentsArrayB));
                    $pos = $pos + 1;
                    $strTemplateContentsArrayB = array_slice($strTemplateContentsArrayB, 0, $pos, true) +
                        array($cldr->context . '[' . $req . ']' => $cldr->context . '[' . $req . ']' . '=' . 'temp. content' . chr(10)) +
                        array_slice($strTemplateContentsArrayB, $pos, count($strTemplateContentsArrayB) - 1, true);
                }
            }
        }
        //print_r($strTemplateContentsArrayB);
        $strTemplateContents = implode('', $strTemplateContentsArrayB);
        //$strTemplateContents = $strTemplateContentsA;
        //print_r($strTemplateContents);
        //echo $strTemplateContents;
        $strTemplateContents = str_replace("\\\n", '', $strTemplateContents);
        //echo "<hr>".$strTemplateContents;
        $arrTemplateContents = explode("\n", $strTemplateContents);
        //echo"<hr><pre>";print_r($arrTemplateContents); echo "</pre>";
        foreach ($arrTemplateContents as $intPos => $strLine) {
            if (preg_match('/^\s*([0-9a-zA-Z\-\_\.\@\?\[\]]+)\s*=\s*(.*)\s*$/s', trim($strLine), $arrMatches)) {
                $arrTemplate[trim($arrMatches[1])] = trim($arrMatches[2]);
                $arrTemplateLines[trim($arrMatches[1])] = $arrMatches[0];
            } elseif (trim($strLine) != '' && $strLine[0] != '#') {
            }
            //echo "<b>$strLine</b></br>";
        }
        //print_r(Capsule::getQueryLog());
        $TranslatedStrings = translatedStrings::where('project_id', '=', $project->project_id)
            ->where('original_file', '=', $Originalfile->file_id)
            ->where('language', '=', $language)
            ->get();
        foreach ($TranslatedStrings as $string) {
            //echo "<pre>"; print_r($string); echo "</pre>";
            $oStr = originalStrings::where('project_id', '=', $project->project_id)
                ->where('file_id', '=', $Originalfile->file_id)
                ->where('context', '=', $string->context)
                ->first();
            if ($oStr->plural_type == 'cldr') {
                $sc = $string->context . '[one]';
                $arrTranslation[$sc] = $string->one;
                $sc = $string->context . '[two]';
                $arrTranslation[$sc] = $string->two;
                $sc = $string->context . '[few]';
                $arrTranslation[$sc] = $string->few;
                $sc = $string->context . '[many]';
                $arrTranslation[$sc] = $string->many;
                $sc = $string->context . '[other]';
                $arrTranslation[$sc] = $string->other;
                $sc = $string->context . '[zero]';
                $arrTranslation[$sc] = $string->zero;
            } else {
                $arrTranslation[$string->context] = $string->context . "=" . $string->one;
            }
        }
        //echo"<pre>Translation:";
        //print_r($arrTranslation);
        //echo "<hr>";
        //print_r($arrTemplateLines);
        //echo"</pre>";
        $strTranslateContents = $strTemplateContents;
        foreach ($arrTemplate as $strKey => $strOriginalText) {
            //echo "<br><b>$strKey</b><br>";
            //print_r($arrTranslation[$strKey]);
            if (isset($arrTranslation[$strKey])) {
                if (preg_match('/[A-Z0-9a-z\.\_\-\[\]]+(\s*=\s*)/', $arrTemplateLines[$strKey], $arrMiddleMatches)) {
                    $strGlue = $arrMiddleMatches[1];
                } else {
                    printf('Glue failed: "%s"<br>', $arrTemplateLines[$strKey]);
                    $strGlue = '=';
                }

                if (strstr($arrTranslation[$strKey], "\n")) {
                    printf('Skpping translation "%s" because it has a newline in it<br>', $arrTranslation[$strKey]);
                    continue;
                }
                //echo "$strKey$strGlue$strOriginalText<br>";
                if (strstr($strTranslateContents, $strKey . $strGlue . $strOriginalText)) {
                    $strTranslateContents = str_replace(
                        $strKey . $strGlue . $strOriginalText,
                        $strKey . $strGlue . $arrTranslation[$strKey],
                        $strTranslateContents
                    );
                } else {
                    printf(
                        'Can\'t find "%s" in the file "%s"<br>',
                        $strKey . $strGlue . $strOriginalText,
                        $this->objFile->FileName
                    );
                }

            } else {
                switch ($type) {
                    case 1:
                        // Empty: include missing strings, return empty string
                        if (preg_match(
                            '/[A-Z0-9a-z\.\_\-]+(\s*=\s*)/',
                            $arrTemplateLines[$strKey],
                            $arrMiddleMatches
                        )
                        ) {
                            $strGlue = $arrMiddleMatches[1];
                        } else {
                            printf('Glue failed: "%s"<br>', $arrTemplateLines[$strKey]);
                            $strGlue = '=';
                        }
                        $strTranslateContents = str_replace(
                            $strKey . $strGlue . $strOriginalText,
                            $strKey . $strGlue . $arrTranslation[$strKey],
                            $strTranslateContents
                        );
                        break;
                    case 2:
                        if (preg_match(
                            '/[A-Z0-9a-z\.\_\-]+(\s*=\s*)/',
                            $arrTemplateLines[$strKey],
                            $arrMiddleMatches
                        )
                        ) {
                            $strGlue = $arrMiddleMatches[1];
                        } else {
                            printf('Glue failed: "%s"<br>', $arrTemplateLines[$strKey]);
                            $strGlue = '=';
                        }
                        $strTranslateContents = str_replace(
                            $strKey . $strGlue . $strOriginalText,
                            '',
                            $strTranslateContents
                        );
                        break;
                    case 3:

                        break;
                    default:
                        // Default: include missing strings, use original string
                        break;
                }
                printf('Couldn\'t find the key "%s" in the translations, using the original text.<br>', $strKey);
                //NarroImportStatistics::$arrStatistics['Texts kept as original']++;
            }
        }
        //echo "Return:<pre>";
        //print_r($strTranslateContents);
        //echo "</pre>";
        return $strTranslateContents;

    }

    static function checkPlurales($text, $PluralRuleCount = 2)
    {
        //echo "Text to check: $text<br>";
        $plurals = mb_split(';', $text);
        $pcount = count($plurals);
        if (($pcount <= $PluralRuleCount) and ($pcount >= 2)) {
            foreach ($plurals as $plural) {
                $len_a = mb_strlen($plural);
                $len_b = mb_strlen(ltrim($plural));
                if ($len_a <> $len_b) {
                    return false;
                }
            }
            return $plurals;
        } else {
            return false;
        }
    }
}