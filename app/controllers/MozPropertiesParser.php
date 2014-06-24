<?php

/* Inspired ny Narro */

class MozPropertiesParser extends BaseParser
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
        if (empty($filename)) {
            throw new \Exception('MozPropertiesParser: File not defined.');
        } elseif (file_exists($filename) === false) {
            throw new \Exception('MozPropertiesParser: File does not exists: "' . htmlspecialchars($filename) . '"');
        } elseif (is_readable($filename) === false) {
            throw new \Exception('MozPropertiesParser: File is not readable: "' . htmlspecialchars($filename) . '"');
        }

        unset($this->result);
        $lines = file($filename);
        foreach ($lines as $line) {
            $line = trim($line);
            $line = str_replace("\n\r", "\n", $line);
            // check for comments
            if (!empty($line)) {
                $objEntity = new FileEntity();
                $pos = strpos(ltrim($line), "#");
                if ($pos === 0) {
                    $this->currentComments[] = $line;
                    continue;
                }
                // ignore other lines
                if (!strpos($line, '=')) {
                    continue;
                }
                $tmp = explode("=", $line, 2);
                $key = rtrim($tmp[0]);
                $value = ltrim($tmp[1]);
                if (preg_match("/^\".*\"$/", $value) || preg_match("/^'.*'$/", $value)) {
                    $value = mb_substr($value, 1, mb_strlen($value) - 2);
                }
                preg_match("/^(.*)\[(zero|one|two|few|many|other)\]$/", $key, $matches);
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
                if ($objEntity instanceof Fileentity) {
                    $this->result[$objEntity->Key] = $objEntity;
                }
            }
        }
        return $this->result;
    }

    static function checkPlurales($text, $PluralRuleCount = 2)
    {
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

    public function Export($project_id, $strTemplateFile, $language, $type = null)
    {
        $type = 2;
        $project = Project::find($project_id);
        $uploadpath = $this->config['app.uploadFolder'] . $project->user_id . '/' . $project->path;

        $path = str_replace($uploadpath, '', $strTemplateFile);

        $Originalfile = OriginalFile::where('file_path', '=', $path)
            ->where('project_id', '=', $project->project_id)
            ->first();
        $strTemplateContents = file_get_contents($uploadpath . $strTemplateFile);
        $strTemplateContents = str_replace("\\\n", '', $strTemplateContents);
        $arrTemplateContents = explode("\n", $strTemplateContents);
        foreach ($arrTemplateContents as $intPos => $strLine) {
            if (preg_match('/^\s*([0-9a-zA-Z\-\_\.\@\?]+)\s*=\s*(.*)\s*$/s', trim($strLine), $arrMatches)) {
                $arrTemplate[trim($arrMatches[1])] = trim($arrMatches[2]);
                $arrTemplateLines[trim($arrMatches[1])] = $arrMatches[0];
            } elseif (trim($strLine) != '' && $strLine[0] != '#') {
            }
        }
        $TranslatedStrings = TranslatedString::where('project_id', '=', $project->project_id)
            ->where('original_file', '=', $Originalfile->file_id)
            ->where('language', '=', $language)
            ->get();
        foreach ($TranslatedStrings as $string) {
            $oStr = OriginalString::where('project_id', '=', $project->project_id)
                ->where('file_id', '=', $Originalfile->file_id)
                ->where('context', '=', $string->context)
                ->first();

            if ($oStr->plural_type == 'cldr') {

            } else {
                $arrTranslation[$string->context] = $string->one;
            }
        }
        $strTranslateContents = $strTemplateContents;
        foreach ($arrTemplate as $strKey => $strOriginalText) {
            if (isset($arrTranslation[$strKey])) {
                if (preg_match('/[A-Z0-9a-z\.\_\-]+(\s*=\s*)/', $arrTemplateLines[$strKey], $arrMiddleMatches)) {
                    $strGlue = $arrMiddleMatches[1];
                } else {
                    sprintf('Glue failed: "%s"', $arrTemplateLines[$strKey]);
                    $strGlue = '=';
                }

                if (strstr($arrTranslation[$strKey], "\n")) {
                    sprintf('Skpping translation "%s" because it has a newline in it', $arrTranslation[$strKey]);
                    continue;
                }

                if (strstr($strTranslateContents, $strKey . $strGlue . $strOriginalText)) {
                    $strTranslateContents = str_replace(
                        $strKey . $strGlue . $strOriginalText,
                        $strKey . $strGlue . $arrTranslation[$strKey],
                        $strTranslateContents
                    );
                } else {
                    sprintf(
                        'Can\'t find "%s" in the file "%s"',
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
                            sprintf('Glue failed: "%s"', $arrTemplateLines[$strKey]);
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
                            sprintf('Glue failed: "%s"', $arrTemplateLines[$strKey]);
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
                sprintf('Couldn\'t find the key "%s" in the translations, using the original text.', $strKey);
            }
        }
        return $strTranslateContents;
    }
}
 