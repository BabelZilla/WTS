<?php

//namespace WTS;
class MozWebAppImporter extends BaseImporter implements Importer
{
    public $user_id;
    public $PluralRules;
    public $project_id;
    public $isAddonSDK;
    public $isUpdate;
    public $uploadPath;
    public $manifest;
    public $manifest_json;
    public $manifestPath;
    public $iniContent = array();
    public $iniLocales = array();
    public $defaultLocale = 'en-US';
    public $workingDir;
    public $chromeManifest;
    public $strWorkingDir;
    public $status;
    public $error;
    public $containedLocales;
    public $project;
    public $messages = array();
    public $RepoPath;
    public $Parsers;
    public $IgnoreList;
    public $L10nResources;
    public $ShortLocales;
    public $wd;
    private $sections;

    function __construct($project_id = null)
    {
        parent::__construct();
        error_reporting(E_ERROR);
        ini_set('display_errors', 1);

        if ($project_id) {
            $this->project = $this->getProject($project_id);
            $this->manifest = json_decode($this->project->webapp_manifest, true);
        }
        $this->user_id = Auth::user()->id;
        $this->uploadPath = Config::Get('wts.uploadFolder') . $this->user_id . '/';
        $this->RepoPath = Config::Get('wts.repoFolder'); //$wts_config['params']['repoFolder'] . $user_id . '/';
        $this->Parsers = Config::Get('wts.parsers'); //$wts_config['params']['parsers'];
        $this->IgnoreList = Config::Get('wts.ignore'); //$wts_config['params']['ignore'];
        $this->ShortLocales = Config::Get('wts.SHORT_LOCALES'); //$wts_config['params']['SHORT_LOCALES'];
        $this->forum_id = 36;
        //require_once('Git.php');
        $this->PluralRules = $PluralRules = json_decode(file_get_contents(app_path() . '/other/all_plurals.json'));
    }

    public function import($strWorkingDir, $fromRepo = false, $remoteUrl = false)
    {
        if (!$fromRepo) {
            $this->workingDir = $this->uploadPath . $strWorkingDir . '/';
            $xpiname = rtrim($strWorkingDir, '_extract');
        } else {
            $this->workingDir = $strWorkingDir . '/';
        }
        if (!$this->project) {
            // Yes, it's a new project...
            $this->isUpdate = false;
            $this->messages[] = '<div class="alert alert-warning" style="margin: 20px 0 0; text-align: center;">No project found<br/>Will create a new one.</div>';
            $this->project = new Project();
            $this->project->user_id = $this->user_id;
        } else {
            // No, it's already on the site, so check permissions of the uploader...
            if (!$this->project->isMaintainer(12)) {
                // The uploader is not a Maintainer of this project, so we stop here with a message.
                Utils::RecursiveDelete($strWorkingDir);
                $this->status = 'error';
                $this->error = 'unauthorized';
                $this->messages[] = '<div class="alert alert-error" style="margin: 20px 0 0; text-align: center;">You don\'t have the permission to update this project.</div>';
                return false;
            }
        }

        if (!$fromRepo) $strWorkingDir = $this->uploadPath . $strWorkingDir;
        $this->wd = $strWorkingDir;

        if (!$this->parseWebAppManifest($strWorkingDir)) {
            $this->status = 'error';
            $this->error = 'Manifest not found';
            $this->messages[] = '<div class="alert alert-error" style="margin: 20px 0 0; text-align: center;">Failed to get webapp.manifest</div>';
            // No manifest data, something is wrong
            Utils::RecursiveDelete($strWorkingDir);
            return false;
        } else {
            $this->messages[] = '<div class="alert alert-success" style="margin: 20px 0 0; text-align: center;">Found webapp.manifest</div>';
        }
        $this->project->root_path = dirname($this->manifestPath);

        if ($fromRepo) {
            $this->project->remote_Url = $remoteUrl;
            $this->project->repo_path = str_replace($this->RepoPath, '', $strWorkingDir);
            $this->project->path = str_replace($this->RepoPath, '', $strWorkingDir);
        } else {
            $this->project->path = str_replace($this->uploadPath, '', $strWorkingDir);
        }
        $this->project->name = $this->manifest['name'];
        $this->project->description = $this->manifest['description'];
        $this->project->ext_ver = $this->manifest['version'];
        $this->project->slug = $this->project->generateUniqueSlug();
        $this->project->source_language = $this->getDefault_Locale();
        $this->project->project_type = 3;
        $this->project->webapp_manifest = $this->manifest_json;
        if ($this->project->save()) {
            $maintainer = $this->project->maintainers()
                ->where('user_id', '=', $this->user_id)
                ->first();
            if (!$maintainer) {
                $maintainer = New ProjectMaintainer();
                $maintainer->project_id = $this->project->project_id;
                $maintainer->user_id = $this->user_id;
                try {
                    $maintainer->save();
                } catch (Exception $exception) {
                    print_r($exception);
                }
            }
            if (!$fromRepo) {
                $xpifile = $this->project->Xpifile()->first();
                if (!$xpifile) {
                    $xpifile = New ProjectXpifile();
                    $xpifile->project_id = $this->project->project_id;
                }
                $xpifile->filename = $xpiname;
                $xpifile->Save();
            }
            // Save it again to add the id to slug
            $this->project->slug = $this->project->generateUniqueSlug();
            $this->project->save();
            $this->status = 'success';
            if ($this->isUpdate) {
                $this->messages[] = '<div class="alert alert-success" style="margin: 20px 0 0; text-align: center;">Project <b>"' . $this->project->name . '"</b> will be updated.</div>';
            } else {
                $this->messages[] = '<div class="alert alert-success" style="margin: 20px 0 0; text-align: center;">A new project named <b>"' . $this->project->name . '"</b> has been created.</div>';
            }
        } else {
            $this->status = 'error';
            $this->messages[] = '<div class="alert alert-error" style="margin: 20px 0 0; text-align: center;">Failed to create <b>"' . $this->project->name . '"</b></div>';
            $this->error = $this->project->getErrors();
        }
        if (isset($this->manifest['default_locale'])) {
            $this->defaultLocale = $this->manifest['default_locale'];
            $this->messages[] = '<div class="alert alert-info" style="margin: 20px 0 0; text-align: center;">Detected default locale: ' . $this->defaultLocale . '</div>';
        } else {
            $this->messages[] = '<div class="alert alert-warning" style="margin: 20px 0 0; text-align: center;">No default locale found, setting ' . $this->defaultLocale . ' as default</div>';
        }
        $this->project->source_language = $this->defaultLocale;
        $this->project->save();

        $this->getL10nResourceLinks($strWorkingDir);
        $this->messages[] = '<div class="alert alert-info" style="margin: 20px 0 0; text-align: center;">Number of found ressources: ' . count(
                $this->L10nResources
            ) . '</div>';
        $notfound = 0;
        foreach ($this->L10nResources as $ini) {
            $iniResult = $this->parseIniStr($ini);

            if (!$iniResult) {
                $notfound++;
                if (count($this->L10nResources) == $notfound) {
                    $this->messages[] = '<div class="alert alert-warning" style="margin: 20px 0 0; text-align: center;">L10n resource not found: ' . $ini . '</div>';
                    $this->messages[] = '<div class="alert alert-error" style="margin: 20px 0 0; text-align: center;">No L10n resources found</div>';
                    $this->error = 'No resources found';
                    $this->status = 'error';
                    return false;
                } else {
                    $this->messages[] = '<div class="alert alert-warning" style="margin: 20px 0 0; text-align: center;">L10n resource not found: ' . $ini . '</div>';
                }
            } else {
                $ini = str_replace($this->workingDir, '', $ini);
                $this->iniLocales[$ini] = array();
                $this->iniLocalesA[$ini] = array();
                foreach ($iniResult as $key => $result) {
                    $this->iniLocales[$ini]['locales'][$key] = $result;
                }
                $this->iniContent = array_merge_recursive($this->iniContent, $iniResult);
            }
        }
        $this->CreateOriginalVirtualFiles();
        $this->CreateOriginal();
        $this->CreateTranslationSets();
        $sections = $this->getSections();
        foreach ($sections as $key => $val) {
            $this->CreateTranslationVirtualFiles($val);
        }
        $this->CreateWebappTranslations();
        $this->status = 'success';
        return true;
    }

    public function CreateOriginalVirtualFiles()
    {
        foreach ($this->iniLocales as $key => $loc) {
            $path = str_replace($this->workingDir, '', $key);
            unset($loc['locales'][$this->project->source_language]['@import']);
            $strings = $loc['locales'][$this->project->source_language];
            $hash = md5(serialize($strings));
            if ($strings) {
                $str_cnt = 0;
                $filename = basename($path);
                $isNew = false;
                $original = $this->project->originalFiles()->where('file_name', '=', $filename)->first();
                if (!$original) {
                    $original = New OriginalFile();
                    $original->status = 'new';
                    $original->file_md5 = $hash;
                    $isNew = true;
                }
                if ($original->file_md5 != $hash) {
                    $original->status = 'changed';
                }
                $original->file_name = $filename;
                $original->project_id = $this->project->project_id;
                $original->active = 1;
                $original->file_path = WtsHelper::add_leading_slash($path);
                $original->is_virtual = 1;
                $original->save();
                $AllStrings = $this->project->originalStrings()
                    ->where('file_id', '=', $original->file_id)
                    ->first();
                foreach ($AllStrings as $data) {
                    $stringsInDB[$data->id] = $data->context;
                }
                foreach ($strings as $key => $string) {
                    $isNew = false;
                    $originalString = $this->project->originalStrings()
                        ->where('file_id', '=', $original->file_id)
                        ->where('context', '=', $key)
                        ->first();
                    if (!$originalString) {
                        $originalString = new OriginalString();
                        $originalString->file_id = $original->file_id;
                        $originalString->project_id = $this->project->project_id;
                        $originalString->status = 'new';
                        $isNew = true;
                    }
                    $originalString->context = $key;
                    if (is_array($string)) {
                        $originalString->zero = $string['zero'];
                        $originalString->one = $string['one'];
                        $originalString->two = $string['two'];
                        $originalString->few = $string['few'];
                        $originalString->many = $string['many'];
                        $originalString->other = $string['other'];
                    } else {
                        $originalString->one = $string;
                        $originalString->plural_type = '';
                    }
                    if (!$isNew) {
                        if ($originalString->md5_hash != md5(
                                $string['zero'] . $string['one'] . $string['two'] . $string['few'] . $string['many'] . $string['other']
                            )
                        ) {
                            $originalString->status = 'changed';
                        }
                    }
                    $originalString->md5_hash = md5(
                        $string['zero'] . $string['one'] . $string['two'] . $string['few'] . $string['many'] . $string['other']
                    );
                    $originalString->save();
                    $str_cnt++;
                    $stringsInFile[] = $key;
                }
                $obsoleteStrings = @array_diff($stringsInDB, $stringsInFile);
                if ($obsoleteStrings) {
                    $obs_cnt = 0;
                    foreach ($obsoleteStrings as $key => $val) {
                        $obsStr = $this->project->originalStrings()->find($key);
                        $obsStr->status = 'old';
                        $obsStr->save();
                        $obs_cnt++;
                        $translatedStr = $obsStr->translatedStrings()->get();
                        foreach ($translatedStr as $tstr) {
                            $tstr->status = 'old';
                            $tstr->save();
                        }
                    }
                }
            }
        }
    }

    public function importResource($filename, $language)
    {

    }

    public function parseWebAppManifest($manifest)
    {
        $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($manifest), RecursiveIteratorIterator::SELF_FIRST);
        foreach ($iterator as $path) {
            if (!$path->isDir()) {
                if (pathinfo($path, PATHINFO_EXTENSION) === 'webapp') {
                    $strFileContent = file_get_contents($path);
                    $this->manifest = json_decode($strFileContent, true);
                    $this->manifest_json = $strFileContent;
                    $this->manifestPath = str_replace($manifest, '', $path);
                    return true;
                }
            }
        }
        return false;
    }

    public function getL10nResourceLinks($directory)
    {
        $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($directory, FilesystemIterator::SKIP_DOTS), RecursiveIteratorIterator::SELF_FIRST);
        $Regex = new RegexIterator($iterator, '#^(?:[A-Z]:)?(?:/(?!\webL10n)[^/]+)+/[^/]+\.(?:htm|html)$#Di');
        foreach ($Regex as $file) {
            $path = $file->getPath() . '/' . $file->getFilename();
            $lines = file($path);
            foreach ($lines as $code) {
                preg_match('/type=("|\')application\/l10n("|\').*?href=("|\')(.*?)("|\')/i', $code, $matches);
                if ($matches) {
                    if (strpos($matches[4], '/') === 0) {
                        $newPath = $directory . $matches[4];
                    } else {
                        $newPath = pathinfo($path, PATHINFO_DIRNAME) . '/' . $matches[4];
                    }
                    $this->L10nResources[realpath($newPath)] = $newPath;
                }
            }
        }
        return ($this->L10nResources);
    }

    public function getDefault_Locale()
    {
        return ($this->defaultLocale);
    }

    public function getSections()
    {
        return ($this->sections);
    }

    private function parseIniStr($iniFile)
    {
        if (!file_exists($iniFile)) {
            return false;
        }
        $iniStr = file_get_contents($iniFile);
        $lines = explode("\n", $iniStr);
        $ret = Array();
        $inside_section = false;
        foreach ($lines as $line) {
            $line = trim($line);
            // check for comments
            if (!$line || $line[0] == "#" || $line[0] == ";") {
                continue;
            }
            // check for @import
            if (preg_match('/^\s*@import\s+url\((.*)\)\s*$/i', $line, $matches)) {
                if ($inside_section) {
                    $ret[$inside_section]['@import'][str_replace($this->workingDir, '', $iniFile)][] = $matches[1];
                } else {
                    $ret[$this->defaultLocale]['@import'][str_replace($this->workingDir, '', $iniFile)][] = $matches[1];
                }
                continue;
            }
            // check for section
            if (preg_match('/^\s*\[(.*)\]\s*$/', $line, $sections)) {
                if ($sections[1] == '*') {
                    $sections[1] = $this->project->source_language;
                }
                $inside_section = $sections[1];
                continue;
            }
            // ignore other lines
            if (!strpos($line, '=')) {
                continue;
            }
            $tmp = explode("=", $line, 2);

            if ($inside_section) {
                $key = rtrim($tmp[0]);
                $value = ltrim($tmp[1]);

                if (preg_match("/^\".*\"$/", $value) || preg_match("/^'.*'$/", $value)) {
                    $value = mb_substr($value, 1, mb_strlen($value) - 2);
                }
                preg_match("/^(.*)\[(zero|one|two|few|many|other)\]$/", $key, $matches);
                if ($matches) {
                    $ret[$inside_section][$matches[1]][$matches[2]] = $value;
                } else {
                    $ret[$inside_section][$key] = $value;
                }
            } else {
                preg_match("/^(.*)\[(zero|one|two|few|many|other)\]$/", trim($tmp[0]), $matches);
                if ($matches) {
                    $ret[$this->defaultLocale][$matches[1]][$matches[2]] = ltrim($tmp[1]);
                } else {
                    $ret[$this->defaultLocale][trim($tmp[0])] = ltrim($tmp[1]);
                }
            }
        }
        $this->sections = array_keys($ret);
        return $ret;
    }

    function CreateWebappTranslations()
    {
        $ts = $this->project->translationssets()->get();
        ## manifest
        $original = $this->project->originalFiles()->where('file_name', '=', 'manifest.webapp')->first();
        $oStrDesc = $original->originalStrings()
            ->where('context', '=', 'description')
            ->first();
        $oStrDevname = $original->originalStrings()
            ->where('context', '=', 'developer_name')
            ->first();
        $oStrDevurl = $original->originalStrings()
            ->where('context', '=', 'developer_url')
            ->first();
        foreach ($ts as $translation) {
            $locale = $translation->locale;
            $isNew = false;
            $translationfile = $original->TranslatedFiles()
                ->where('translation_set', '=', $translation->translationset_id)
                ->first();
            if (!$translationfile) {
                $translationfile = new TranslatedFile();
                $translationfile->original_file = $original->file_id;
                $translationfile->translation_set = $translation->translationset_id;
                $translationfile->project_id = $this->project->project_id;
                $translationfile->active = true;
                $translationfile->source_language = $this->project->source_language;
                $translationfile->language = $translation->locale;
                $translationfile->file_name = $original->file_name;
                $translationfile->file_path = $original->file_path;
                $translationfile->status = 'new';
                $isNew = true;
            }
            if (!$isNew) {
                $currentMd5 = $translationfile->file_md5;
                $translationfile->file_md5 = md5(
                    $this->manifest[locales][$translation->locale][description] . $this->manifest[locales][$translation->locale][developer][name] . $this->manifest[locales][$translation->locale][developer][url]
                );
                $translationfile->status = ($currentMd5 != $translationfile->file_md5) ? 'changed' : 'unchanged';
            } else {
                $translationfile->file_md5 = md5(
                    $this->manifest[locales][$translation->locale][description] . $this->manifest[locales][$translation->locale][developer][name] . $this->manifest[locales][$translation->locale][developer][url]
                );
            }
            $translationfile->save();
            if ($oStrDesc) {
                $translatedStr = $oStrDesc->translatedStrings()
                    ->where('language', '=', $translationfile->language)
                    ->first();
                $isNew = false;
                if (!$translatedStr) {
                    $translatedStr = new translatedString();
                    $translatedStr->project_id = $this->project->project_id;
                    $translatedStr->original_id = $oStrDesc->id;
                    $translatedStr->original_file = $original->file_id;
                    $translatedStr->translation_set_id = $translation->translationset_id;
                    $translatedStr->language = $translationfile->language;
                    $translatedStr->status = 'new';
                    $isNew = true;
                }
                $translatedStr->context = 'description';
                $translatedStr->one = $this->manifest[locales][$translation->locale][description];
                $translatedStr->user_id = $this->user_id;
                if (!$isNew) {
                    if ($translatedStr->md5_hash != md5($this->manifest[locales][$translation->locale][description])) {
                        $translatedStr->status = 'changed';
                    }
                }
                $translatedStr->md5_hash = md5($this->manifest[locales][$translation->locale][description]);
                try {
                    $translatedStr->save();
                } catch (Exception $e) {

                }
            }
        }
    }

    function CreateTranslationfiles()
    {
        if (array_key_exists($this->project->source_language, $this->ShortLocales)) {
            $longLocale = $this->ShortLocales[$this->project->source_language];
        }
        $of = $this->project->originalFiles()->where('is_virtual', '=', 0)->where('active', '=', 1)->get();
        $ts = $this->project->translationssets()->get();

        foreach ($ts as $translation) {
            foreach ($of as $ofile) {
                unset ($newpathparts);
                $parts = explode('.', $ofile->file_name);
                if ($parts[count($parts) - 2] === $this->project->source_language) {
                    $parts[count(
                        $parts
                    ) - 2] = $translation->locale;
                }
                if ($parts[count($parts) - 2] === $longLocale) {
                    $parts[count($parts) - 2] = $translation->locale;
                }
                $newfile = implode('.', $parts);
                $pathparts = explode('/', $ofile->file_path);

                foreach ($pathparts as $key => $value) {
                    if ($this->project->source_language == $value) {
                        $newpathparts[] = $translation->locale;
                    } elseif
                    ($longLocale == $value
                    ) {
                        $newpathparts[] = $translation->locale;;
                    } else {
                        $newpathparts[] = $value;
                    }
                }
                $newpath = WtsHelper::gp_add_slash(implode('/', $newpathparts));
                $translationfile = $ofile->TranslatedFiles()
                    ->where('translation_set', '=', $translation->translationset_id)
                    ->first();

                if (!$translationfile) {
                    $translationfile = new TranslatedFile();
                    $translationfile->original_file = $ofile->file_id;
                    $translationfile->translation_set = $translation->translationset_id;
                    $translationfile->project_id = $this->project->project_id;
                    $translationfile->active = true;
                    $translationfile->source_language = $this->project->source_language;
                    $translationfile->language = $translation->locale;
                }
                $translationfile->file_name = $newfile;
                $translationfile->file_path = $newpath;
                $toOpen = WtsHelper::removeDoubleSlashes(
                    $this->uploadPath . $this->project->path . WtsHelper::trailingslashit(dirname($newpath)) . $newfile
                );
                if (file_exists($toOpen)) {
                    $translationfile->file_md5 = md5_file($toOpen);
                } else { //echo "Failed: $toOpen<br>";
                }
                $translationfile->save();
            }
        }
    }

    function CreateTranslationSets()
    {
        $sections = $this->getSections();
        $of = $this->project->originalFiles()->get();
        foreach ($sections as $key => $val) {
            if ($key != $this->project->source_language) {
                $translationset = $this->project->translationssets()
                    ->where('locale', "=", $key)
                    ->first();
                if (!$translationset) {
                    $translationset = New ProjectTranslationSet();
                }
                $translationset->project_id = $this->project->project_id;
                $translationset->name = $val;
                $translationset->slug = $val;
                $translationset->locale = $val;
                $translationset->save();
                foreach ($of as $orig) {
                    if (!$orig->is_virtual) {


                    }
                }
            }
        }
        $this->messages[] = '<div class="alert alert-success" style="margin: 20px 0 0; text-align: center;">Locales found: ' . implode(
                ', ',
                $sections
            ) . '</div>';
        return true;
    }

    function CreateOriginal()
    {
        $isNew = false;
        $original = $this->project->originalFiles()->where('file_name', '=', 'manifest.webapp')->first();
        if (!$original) {
            $original = New OriginalFile();
            $original->status = 'new';
            $isNew = true;
        }
        $original->file_name = 'manifest.webapp';
        $original->project_id = $this->project->project_id;
        $original->active = 1;
        $original->file_path = WtsHelper::add_leading_slash($this->manifestPath);
        $original->is_virtual = 1;
        if (!$isNew) {
            $currentMd5 = $original->file_md5;
            $original->file_md5 = md5(
                $this->manifest[description] . $this->manifest[developer][name] . $this->manifest[developer][url]
            );
            $original->status = ($currentMd5 != $original->file_md5) ? 'changed' : 'unchanged';
        } else {
            $original->file_md5 = md5(
                $this->manifest[description] . $this->manifest[developer][name] . $this->manifest[developer][url]
            );
        }
        $original->save();
        $isNew = false;
        if ($this->manifest[description]) {
            $originalString = $this->project->originalStrings()
                ->where('file_id', '=', $original->file_id)
                ->where('context', '=', 'description')
                ->first();
            if (!$originalString) {
                $originalString = new OriginalString();
                $originalString->file_id = $original->file_id;
                $originalString->project_id = $this->project->project_id;
                $originalString->status = 'new';
                $isNew = true;
            }
            $originalString->context = 'description';
            $originalString->one = $this->manifest[description];
            $str_md5 = md5($this->manifest[description]);
            $originalString->status = ($str_md5 != $originalString->md5_hash) ? 'changed' : 'unchanged';
            $originalString->save();
        }
        $isNew = false;
        if ($this->manifest[developer][name]) {
            $originalString = $this->project->originalStrings()
                ->where('file_id', '=', $original->file_id)
                ->where('context', '=', 'developer_name')
                ->first();
            if (!$originalString) {
                $originalString = new OriginalString();
                $originalString->file_id = $original->file_id;
                $originalString->project_id = $this->project->project_id;
                $originalString->status = 'new';
                $isNew = true;
            }
            $originalString->context = 'developer_name';
            $originalString->one = $this->manifest[developer][name];
            $str_md5 = md5($this->manifest[developer][name]);
            $originalString->status = ($str_md5 != $originalString->md5_hash) ? 'changed' : 'unchanged';
            $originalString->save();
        }
        $isNew = false;
        if ($this->manifest[developer][url]) {
            $originalString = $this->project->originalStrings()
                ->where('file_id', '=', $original->file_id)
                ->where('context', '=', 'develeoper_url')
                ->first();
            if (!$originalString) {
                $originalString = new OriginalString();
                $originalString->file_id = $original->file_id;
                $originalString->project_id = $this->project->project_id;
                $originalString->status = 'new';
                $isNew = true;
            }
            $originalString->context = 'developer_url';
            $originalString->one = $this->manifest[developer][url];
            $str_md5 = md5($this->manifest[developer][url]);
            $originalString->status = ($str_md5 != $originalString->md5_hash) ? 'changed' : 'unchanged';
            $originalString->save();
        }

        // Real files

        $originals = $this->project->originalFiles()
            ->where('active', '=', 1)
            ->where('is_virtual', '=', 0)
            ->get();
        $FoundFiles = array();
        $RemovedFiles = array();
        $ExistingFiles = array();
        if ($this->iniContent[$this->getDefault_Locale()]) {
            $inis = $this->iniContent[$this->getDefault_Locale()]['@import'];

            foreach ($inis as $iniRef => $ini) {
                foreach ($ini as $file => $val) {
                    $iniPath = pathinfo($iniRef, PATHINFO_DIRNAME);
                    $FoundFiles[$iniRef] = wtshelper::gp_add_slash($iniPath) . $val;
                }
            }
        } else {
            $this->status = 'error';
            $this->messages[] = '<div class="alert alert-error" style="margin: 20px 0 0; text-align: center;">No locale files found<br>Please check your uploaded file.</div>';
            return false;
        }
        if ($originals) {
            foreach ($originals as $originalFile) {
                $ExistingFiles[$originalFile->file_id] = $originalFile->file_path;
            }
        }

        $RemovedFiles = array_diff($ExistingFiles, $FoundFiles);
        $AddedFiles = array_diff($FoundFiles, $ExistingFiles);

        if ($RemovedFiles) {
            foreach ($RemovedFiles as $key => $val) {
                $result = originalFiles::find($key);
                //$result = OriginalFiles::Model()->findByPk($key);
                if ($result) {
                    $result->active = 0;
                    $result->status = 'removed';
                    $result->save();
                    $tFiles = $result->TranslatedFiles()->get();
                    foreach ($tFiles as $tfile) {
                        $tfile->active = 0;
                        $tfile->status = 'removed';
                        $tfile->save();
                    }
                }
            }
        }
        if ($AddedFiles) {
            foreach ($AddedFiles as $key => $val) {
                $result = $this->project->originalFiles()->where('file_path', '=', $val)->first();
                if (!$result) {
                    $result = New originalFile();
                    $result->project_id = $this->project->project_id;
                }
                $result->iniRef = str_replace($this->uploadPath, '', $key);
                $result->iniRef = str_replace($this->workingDir, '', $result->iniRef);
                $result->file_name = pathinfo($val, PATHINFO_BASENAME);
                $result->file_path = WtsHelper::add_leading_slash(
                    WtsHelper::gp_add_slash($val)
                );
                /*$result->file_path = WtsHelper::add_leading_slash(
                    wtshelper::gp_add_slash(dirname($val))
                );*/
                $result->file_md5 = md5_file(WtsHelper::gp_add_slash($this->workingDir) . $result->file_path);
                $result->active = 1;
                $result->status = 'new';
                try {
                    $result->save();
                } catch (Exception $e) {
                    var_dump($e);
                }

            }
        }
        if ($FoundFiles) {
            foreach ($FoundFiles as $file) {
                $ext = pathinfo($file, PATHINFO_EXTENSION);
                if (array_key_exists($ext, $this->Parsers)) {
                    $parser = $this->Parsers[$ext];
                    $parser = new $parser();
                    $filedata = $parser->Parse($this->workingDir . $file, 2);
                    $AllStrings = $this->project->originalStrings()
                        ->where('file_id', '=', $result->file_id)
                        ->first();
                    /*$AllStrings = GpOriginals::Model()->findAllByAttributes(
                        array('file_id' => $result->file_id, 'project_id' => $this->project->project_id,)
                    );*/
                    foreach ($AllStrings as $data) {
                        $stringsInDB[$data->id] = $data->context;
                    }
                    if ($filedata) {
                        $str_cnt = 0;
                        foreach ($filedata as $entity) {
                            $isNew = false;
                            $originalString = $this->project->originalStrings()
                                ->where('file_id', '=', $result->file_id)
                                ->where('context', '=', $entity->Key)
                                ->first();
                            /*$originalString = GpOriginals::Model()->findByAttributes(
                                array(
                                    'file_id' => $return->file_id,
                                    'project_id' => $this->project->project_id,
                                    'context' => $entity->Key,
                                )
                            );*/
                            if (!$originalString) {
                                $originalString = new OriginalString();
                                $originalString->file_id = $result->file_id;
                                $originalString->project_id = $this->project->project_id;
                                $originalString->status = 'new';
                                $isNew = true;
                            }
                            //print_r($entity);
                            $originalString->context = $entity->Key;
                            $originalString->zero = $entity->zero;
                            $originalString->one = $entity->one;
                            $originalString->two = $entity->two;
                            $originalString->few = $entity->few;
                            $originalString->many = $entity->many;
                            $originalString->other = $entity->other;
                            $originalString->comment = $entity->comment;
                            $originalString->references = $entity->reference; //$this->containedLocales[$this->project->source_language] . $fname . '.' . $ext;
                            $originalString->words = str_word_count($entity->Value);
                            $originalString->plural_type = $entity->pluraltype;
                            if (!$isNew) {
                                if ($originalString->md5_hash != md5(
                                        $entity->zero . $entity->one . $entity->two . $entity->few . $entity->many . $entity->other
                                    )
                                ) {
                                    $originalString->status = 'changed';
                                }
                            }
                            $originalString->md5_hash = md5(
                                $entity->zero . $entity->one . $entity->two . $entity->few . $entity->many . $entity->other
                            );
                            $originalString->save();
                            $str_cnt++;
                            //print_r($originalString->getErrors());
                            $stringsInFile[] = $entity->Key;
                            //echo "<pre>";print_r($entity);echo "</pre>";
                        }
                    }
                    $obsoleteStrings = @array_diff($stringsInDB, $stringsInFile);
                    if ($obsoleteStrings) {
                        $obs_cnt = 0;
                        foreach ($obsoleteStrings as $key => $val) {
                            //$obsStr = GpOriginals::Model()->findByPk($key);
                            $obsStr = $this->project->originalStrings()->find($key);
                            $obsStr->status = 'old';
                            $obsStr->save();
                            $obs_cnt++;
                            $translatedStr = $obsStr->translatedStrings()->get();
                            foreach ($translatedStr as $tstr) {
                                $tstr->status = 'old';
                                $tstr->save();
                            }
                        }
                    }
                    $result->string_count = $str_cnt - $obs_cnt;
                    //if (md5_file($file) != $originalfile->file_md5) echo md5_file($file) ." - " . $originalfile->file_md5 . "<br>";
                    if (md5_file($file) != $result->file_md5) {
                        if (!array_key_exists($key, $AddedFiles)) {
                            $result->status = 'changed';
                        }
                    }
                    $result->save();
                }
            }
        }
        return true;
    }

    function CreateTranslationVirtualFiles($language)
    {

        $translationSet = $this->project->translationssets()
            ->where('locale', '=', $language)
            ->first();
        if (!$translationSet) {
            return false;
        }
        $originals = $this->project->originalFiles()
            ->where('active', '=', 1)
            ->where('is_virtual', '=', 1)
            ->where('file_name', '<>', 'manifest.webapp')
            ->get();
        //print_r (Capsule::getQueryLog());
        foreach ($originals as $original) {
            $strings = $this->iniLocales[WtsHelper::removeDoubleSlash(
                $this->workingDir . $original->file_path
            )]['locales'][$language];
            $strings = array_filter($strings);
            $hash = md5(serialize($strings));
            $isNew = false;
            $translationfile = $original->TranslatedFiles()
                ->where('status', '<>', 'removed')
                ->where('active', '=', 1)
                ->where('translation_set', '=', $translationSet->translationset_id)
                ->first();
            if (!$translationfile) {
                $translationfile = new TranslatedFile();
                $translationfile->original_file = $original->file_id;
                $translationfile->translation_set = $translationSet->translationset_id;
                $translationfile->project_id = $this->project->project_id;
                $translationfile->active = true;
                $translationfile->source_language = $this->project->source_language;
                $translationfile->language = $language;
                $translationfile->file_md5 = $hash;
                $translationfile->status = "new";
                $isNew = true;
            }

            $translationfile->file_name = $original->file_name;
            $translationfile->file_path = $original->file_path;
            if (!$isNew) {
                $translationfile->status = ($hash != $translationfile->file_md5) ? 'changed' : 'unchanged';
            }
            try {
                $translationfile->save();
                foreach ($strings as $key => $val) {
                    $oStr = $original->originalStrings()
                        ->where('context', '=', $key)
                        ->first();
                    if ($oStr) {
                        if ($oStr->status <> 'old') {
                            $translatedStr = $oStr->translatedStrings()
                                ->where('language', '=', $language)
                                ->first();
                            $isNew = false;
                            if (!$translatedStr) {
                                $translatedStr = new TranslatedString();
                                $translatedStr->project_id = $this->project->project_id;
                                $translatedStr->original_id = $oStr->id;
                                $translatedStr->original_file = $original->file_id;
                                $translatedStr->translation_set_id = $translationSet->translationset_id;
                                $translatedStr->language = $language;
                                $translatedStr->status = 'new';
                                $isNew = true;
                            }
                            $translatedStr->context = $key;
                            if (is_array($val)) {
                                $translatedStr->zero = $val['zero'];
                                $translatedStr->one = $val['one'];
                                $translatedStr->two = $val['two'];
                                $translatedStr->few = $val['few'];
                                $translatedStr->many = $val['many'];
                                $translatedStr->other = $val['other'];
                            } else {
                                $translatedStr->one = $val;
                            }
                            $translatedStr->user_id = $this->user_id;
                            if (!$isNew) {
                                if ($translatedStr->md5_hash != md5(
                                        $val['zero'] . $val['one'] . $val['two'] . $val['few'] . $val['many'] . $val['other']
                                    )
                                ) {
                                    $translatedStr->status = 'changed';
                                }
                            }
                            $translatedStr->md5_hash = md5(
                                $val['zero'] . $val['one'] . $val['two'] . $val['few'] . $val['many'] . $val['other']
                            );
                            $translatedStr->save();
                        } else {
                            //echo "<b>$entity->Key is outdated<br>";
                        }
                        //print_r($oStr);
                    }
                }

                //return true;
            } catch (Exception $e) {
                return false;
            }
        }
        //print_r(Capsule::getQueryLog());
    }

    function CreateTranslation($language)
    {
        $translationSet = $this->project->translationssets()
            ->where('locale', '=', $language)
            ->first();
        if (!$translationSet) {
            return false;
        }
        //print_r($translationSet);
        $originals = $this->project->originalFiles()
            ->where('active', '=', 1)
            ->where('is_virtual', '=', 0)
            ->get();
        foreach ($originals as $original) {
            $tfile = $original->TranslatedFiles()
                ->where('status', '<>', 'removed')
                ->where('active', '=', 1)
                ->where('translation_set', '=', $translationSet->translationset_id)
                ->first();

            //foreach ($tfiles as $tfile) {
            //print_r($tfile);
            $ext = pathinfo($tfile->file_name, PATHINFO_EXTENSION);
            $fpath = pathinfo($tfile->file_path, PATHINFO_DIRNAME);
            if (array_key_exists($ext, $this->Parsers)) {
                $parser = $this->Parsers[$ext];
                $parser = new $parser();
                $toOpen = WtsHelper::removeDoubleSlashes(
                    $this->uploadPath . $this->project->path . $fpath . '/' . $tfile->file_name
                );
                if (!file_exists($toOpen)) {
                    //echo "Not found: ".$toOpen."<br>";
                }
                //echo $toOpen."<br>";
                $filedata = $parser->Parse($toOpen, 2);
            }
            foreach ($filedata as $entity) {
                //print_r($entity);
                $oStr = $original->originalStrings()
                    ->where('context', '=', $entity->Key)
                    ->first();
                if ($oStr) {
                    if ($oStr->status <> 'old') {
                        $translatedStr = $oStr->translatedStrings()
                            ->where('language', '=', $tfile->language)
                            ->first();
                        $isNew = false;
                        if (!$translatedStr) {
                            $translatedStr = new TranslatedString();
                            $translatedStr->project_id = $this->project->project_id;
                            $translatedStr->original_id = $oStr->id;
                            $translatedStr->original_file = $original->file_id;
                            $translatedStr->translation_set_id = $translationSet->translationset_id;
                            $translatedStr->language = $tfile->language;
                            $translatedStr->status = 'new';
                            $isNew = true;
                        }
                        $translatedStr->context = $entity->Key;
                        $translatedStr->zero = $entity->zero;
                        $translatedStr->one = $entity->one;
                        $translatedStr->two = $entity->two;
                        $translatedStr->few = $entity->few;
                        $translatedStr->many = $entity->many;
                        $translatedStr->other = $entity->other;
                        $translatedStr->user_id = $this->user_id;
                        if (!$isNew) {
                            if ($translatedStr->md5_hash != md5(
                                    $entity->zero . $entity->one . $entity->two . $entity->few . $entity->many . $entity->other
                                )
                            ) {
                                $translatedStr->status = 'changed';
                            }
                        }
                        $translatedStr->md5_hash = md5(
                            $entity->zero . $entity->one . $entity->two . $entity->few . $entity->many . $entity->other
                        );
                        if ($translatedStr->md5_hash != $oStr->md5_hash) $translatedStr->save();
                    } else {
                        //echo "<b>$entity->Key is outdated<br>";
                    }
                    //print_r($oStr);
                } else {
                    //echo "Skipping $entity->Key<br>";
                }
                //}
            }
        }
    }

    function tests()
    {
        $originals = $this->project->originalFiles()
            ->where('active', '=', 1)
            ->where('is_virtual', '=', 0)
            ->get();
        foreach ($originals as $original) {
            $origStrings = $original->originalStrings()
                ->where('status', '<>', 'old')
                ->get();
            //echo "COUNT:".count($origStrings);
            //print_r($origStrings);
            $tfiles = $original->TranslatedFiles()
                ->where('status', '<>', 'removed')
                ->where('active', '=', 1)
                ->get();
            foreach ($tfiles as $tfile) {
                $ext = pathinfo($tfile->file_name, PATHINFO_EXTENSION);
                if (array_key_exists($ext, $this->Parsers)) {
                    $parser = $this->Parsers[$ext];
                    $parser = new $parser();
                    $toOpen = WtsHelper::removeDoubleSlashes(
                        $this->uploadPath . $this->project->path . $tfile->file_path . $tfile->file_name
                    );
                    if (file_exists($toOpen)) {
                        echo "Yes<br>";
                    }
                    $filedata = $parser->Parse($toOpen, 2);
                }
                foreach ($filedata as $entity) {
                    //print_r($entity);
                    $oStr = $original->originalStrings()
                        ->where('context', '=', $entity->Key)
                        ->first();
                    if ($oStr) {
                        if ($oStr->status <> 'old') {
                            $translatedStr = $oStr->translatedStrings()
                                ->where('language', '=', $tfile->language)
                                ->first();
                            $isNew = false;
                            if (!$translatedStr) {
                                $translatedStr = new TranslatedString();
                                $translatedStr->project_id = $this->project->project_id;
                                $translatedStr->original_id = $oStr->id;
                                $translatedStr->original_file = $original->file_id;
                                $translatedStr->translation_set_id = 1;
                                $translatedStr->language = $tfile->language;
                                $translatedStr->status = 'new';
                                $isNew = true;
                            }
                            $translatedStr->context = $entity->Key;
                            $translatedStr->zero = $entity->zero;
                            $translatedStr->one = $entity->one;
                            $translatedStr->two = $entity->two;
                            $translatedStr->few = $entity->few;
                            $translatedStr->many = $entity->many;
                            $translatedStr->other = $entity->other;
                            $translatedStr->user_id = $this->user_id;
                            if (!$isNew) {
                                if ($translatedStr->md5_hash != md5(
                                        $entity->zero . $entity->one . $entity->two . $entity->few . $entity->many . $entity->other
                                    )
                                ) {
                                    $translatedStr->status = 'changed';
                                }
                            }
                            $translatedStr->md5_hash = md5(
                                $entity->zero . $entity->one . $entity->two . $entity->few . $entity->many . $entity->other
                            );
                            $translatedStr->save();
                        } else {
                            echo "<b>$entity->Key is outdated<br>";
                        }
                        //print_r($oStr);
                    } else {
                        echo "Skipping $entity->Key<br>";
                    }
                }
            }
        }
    }
}
 