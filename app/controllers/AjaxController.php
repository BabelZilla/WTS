<?php

use Guzzle\Service\Client;

class AjaxController extends BaseController
{

    public function __construct()
    {
        /* Only Ajax requests are allowed */
        $this->beforeFilter('ajax');
    }

    public function getrepolocales()
    {
        $repo = Input::Get('repo');
        $client = new Client();
        $request = $client->get("http://transvision-beta.mozfr.org/api/v1/locales/$repo");
        $response = $request->send();
        $langs = json_decode($response->getBody());
        foreach ($langs as $lang) {
            $availLangs[] = WtsHelper::makeOption($lang, $lang);
        }
        $ajaxresponse['source'] = WtsHelper::selectList($availLangs, 'sourcelocale', '', 'text', 'value', $source_language);
        $ajaxresponse['target'] = WtsHelper::selectList($availLangs, 'locale', '', 'text', 'value', $locale);
        $ajaxresponse = json_encode($ajaxresponse);
        echo $ajaxresponse;
    }

    public function saveusersettings()
    {
        $locale = Input::get('Applocale', 'en');
        $preflicense = Input::get('license', 'MPL-2.0');
        $timezone = Input::get('timezone', 'UTC');
        $dateformat = Input::get('dateformat', 'as_short');
        $uid = Auth::User()->id;
        $user = User::find($uid);
        $settings['timezone'] = $timezone;
        $settings['locale'] = $locale;
        $settings['license'] = $preflicense;
        $settings['dateformat'] = $dateformat;
        $user::unguard();
        $user->settings = serialize($settings);

        try {
            $user->updateUniques();
            $queries = DB::getQueryLog();
            $last_query = end($queries);

        } catch (Exception $e) {
            echo $e->getMessage();
        }
        $user::reguard();
    }

    public function getlocales($language)
    {
        $locales = file_get_contents(app_path() . '/other/' . $language . '.lang');
        return $locales;
    }

    public function versions()
    {
        $context = Input::Get('context');
        $projectId = Input::Get('project');
        $language = Input::Get('language');
        $fileId = Input::Get('fileId');
        $oFile = Input::Get('ofile');
        $versions = Input::Get('versions');
        $show = Input::Get('show');

        $entity = OriginalString::where('project_id', '=', $projectId)
            ->where('context', '=', $context)
            ->first();
        $translationSet = ProjectTranslationSet::where('project_id', '=', $projectId)
            ->where('locale', '=', $language)
            ->first();
        $translation = TranslatedString::where('project_id', '=', $projectId)
            ->where('original_id', '=', $entity->id)
            ->where('translation_set_id', '=', $translationSet->translationset_id)
            ->first();
        $translationLastVersions = $translation->getLastVersions($show);
        $PluralRules = WtsHelper::getRule($language);
        if (!$PluralRules) {
            $lang = substr($language, 0, 2);
            $PluralRules = WtsHelper::getRule($lang);
        }
        if ($translationLastVersions) {
            foreach ($translationLastVersions as $t) {
                $vars = array(
                    'entity' => $entity,
                    't' => $t,
                    'member_name' => $member_name,
                    'PluralRules' => $PluralRules
                );
                $versionHtml = $this->renderPhpToString('versions.php', $vars);
                echo $versionHtml;
            }
            if ($versions > $show) {
                $diff = $versions - $show;
                echo "<div class='span12'>$diff more versions available</div><div class='clear'></div><hr/>";
            }
        } else {

        }
    }

    public function parse()
    {
        $langname = Input::get('language');
        $projectId = Input::get('project');
        $project = $this->getProject($projectId);

        $translationsets = $project->translationssets()->get();
        foreach ($translationsets as $set) {
            $langs[] = $set->name;
        }
        if (!$langname) {
            $langname = $langs[0];
        }
        switch ($project->project_type) {
            case 2:
                $Importer = new MozImporter();
                if ($project->sdk) {
                    $Importer->ImportJson($langname);
                } else {
                    $Importer->ImportFromDirectory($Importer->project->path, $langname);
                }
                break;
            case 3:
                $Importer = new MozWebAppImporter($projectId);
                $Importer->project = $project;
                $translationsSets = $Importer->project->translationssets()->select(array('locale'))->get()->toArray();
                $language = Input::get('language');
                if (!$language) $language = 0;
                $lang = $translationsSets[$language]['locale'];
                $Importer->CreateTranslation($lang);
                if ($language < count($translationsSets) - 1) {
                    $nextlang = $language + 1;
                    $divpro = "pro_" . $lang;
                    echo '<script type="text/javascript">';
                    echo '$jq("#' . $divpro . '").html("<center><b>Done</b></center>");';
                    echo 'setTimeout(\'readlp("' . $nextlang . '")\',800);';
                    echo '</script>';
                } else {
                    $divpro = "pro_" . $lang;
                    echo '<script type="text/javascript">';
                    echo '$jq("#' . $divpro . '").html("<center><b>Done</b></center>");';
                    echo '$jq("#nextclick").show();</script>';
                }
                break;
        }
    }

    public function save()
    {
        $requestID = Input::get('QuesID');
        $user_id = Auth::user()->id;
        $translatedstr = $this->utf8_urldecode(Input::get('itemValue'));
        $projectId = Input::get('project');
        $language = Input::get('language');
        $fileId = Input::get('fileId');
        $oFile = Input::get('ofile');
        $plural = Input::get('plural');
        //$pluralRule = json_decode(Input::get('pluralrule'));
        $originalString = Input::get('context');
        $project = $this->getProject($projectId);
        $isTranslator = $project->isTranslator($language, $user_id);
        $isMaintainer = $project->isMaintainer($user_id);
        $tText = $isTranslator ? 'Yes' : 'No';
        $mText = $isMaintainer ? 'Yes' : 'No';

        $entity = OriginalString::where('project_id', '=', $projectId)
            ->where('context', '=', $requestID)
            ->first();
        $translationSet = ProjectTranslationSet::where('project_id', '=', $projectId)
            ->where('locale', '=', $language)
            ->first();
        $translation = TranslatedString::where('project_id', '=', $projectId)
            ->where('original_id', '=', $entity->id)
            ->where('translation_set_id', '=', $translationSet->translationset_id)
            ->first();
        $tfile = TranslatedFile::where('original_file', '=', $oFile)
            ->where('project_id', '=', $projectId)
            ->where('language', '=', $language)
            ->first();
        $isTranslator = true;
        if ($isTranslator) {
            if (!empty($translatedstr)) {
                if (!$translation) {
                    $translation = new TranslatedString();
                    $translation->project_id = $projectId;
                    $translation->context = $entity->context;
                    $translation->original_id = $entity->id;
                    $translation->translation_set_id = $translationSet->translationset_id;
                    $translation->original_file = $oFile;
                    $translation->user_id = $user_id;
                    $translation->language = $language;
                    $translation->file_id = $tfile->file_id;
                    $change = 'status-translated';
                }
                $translation->{$plural} = $translatedstr;
                if (!$translation->save()) {
                    die('Error');
                }
            } else {
                $translation->Delete();
                unset($translation);
                $change = 'status-untranslated';
            }
        } else {
            $translation = new Suggestion();
            $translation->project_id = $projectId;
            $translation->context = $entity->context;
            $translation->original_id = $entity->id;
            $translation->translation_set_id = $translationSet->translationset_id;
            $translation->original_file = $oFile;
            $translation->user_id = $user_id;
            $translation->language = $language;
            $translation->file_id = $tfile->file_id;
            $translation->{$plural} = $translatedstr;
            $translation->save();
            $change = 'status-unproofed';
        }
        $orgstr = $translation;
        $vars = array(
            'entity' => $mText,
            'orgstr' => $translation,
            //'PluralRule' => $pluralRule,
        );

        //$row = $this->renderPhpToString('translationrow.php', $vars);
        $response['id'] = $entity->id;
        $response['row'] = NULL;
        $response['change'] = $change;
        echo json_encode($response);
        //return Response::json($response);
    }

    public function suggestions()
    {
        $page = Input::get('page');
        $projectId = Input::get('project');
        $language = Input::get('language');
        $file = Input::get('file');
        $oFile = Input::get('ofile');
        $originalString = Input::get('context');
        $cnt = Suggestion::where('project_id', '=', $projectId)
            ->where('file_id', '=', $file)
            ->where('original_file', '=', $oFile)
            ->where('language', '=', $language)
            ->where('context', '=', $originalString)
            ->count();
        if ($cnt) {
            $website = route('ajaxsuggestions', array('project' => $projectId,
                'language' => $language,
                'file' => $file,
                'ofile' => $oFile,
                'context' => $originalString,
            ));
            $pagination = new CSSPagination($cnt, 1, $website, 'ajaxPage');
            $pagination->setPage($page);
            $suggestion = Suggestion::where('project_id', '=', $projectId)
                ->where('file_id', '=', $file)
                ->where('original_file', '=', $oFile)
                ->where('language', '=', $language)
                ->where('context', '=', $originalString)
                ->take(1)
                ->skip($pagination->getLimit())
                ->get();
            $suggestion = $suggestion[0];
            $user = User::find($suggestion->user_id);
            $PluralRules = WtsHelper::getRule($language);
            if (!$PluralRules) {
                $lang = substr($language, 0, 2);
                $PluralRules = WtsHelper::getRule($lang);
            }
            echo $pagination->showPage();
            $vars = array(
                'entity' => $originalString,
                't' => $suggestion,
                'member_name' => $user->name,
                'PluralRules' => $PluralRules
            );
            $versionHtml = renderPhpToString('widgets/versions.php', $vars);
            echo $versionHtml;
        } else {
            echo "No previous version";
        }
    }

    public function preview()
    {
        $context = Input::get('context');
        $projectId = Input::get('project');
        $language = Input::get('language');
        $fileId = Input::get('fileId');
        $oFile = Input::get('ofile');

        $entity = originalStrings::where('project_id', '=', $projectId)
            ->where('file_id', '=', $oFile)
            ->where('context', '=', $context)
            ->first();
        //print_r(Capsule::getQueryLog());
        $translationSet = ProjectTranslationSets::where('project_id', '=', $projectId)
            ->where('locale', '=', $language)
            ->first();
        $translation = translatedStrings::where('project_id', '=', $projectId)
            ->where('original_id', '=', $entity->id)
            ->where('translation_set_id', '=', $translationSet->translationset_id)
            ->first();
        echo "<div class='row'><div class='large-10 columns'>";
        echo $entity->one . "<hr/>" . $translation->one;
        echo "</div></div>";
    }

    public function upload()
    {
        $user_id = Auth::user()->id;
        $tempFolder = Config::Get('wts.tempFolder');
        $uploadFolder = Config::Get('wts.uploadFolder') . $user_id . '/';
        $project = Input::get('project');

        // Try to create folders
        @mkdir($uploadFolder);
        @mkdir($tempFolder, 0777, true);
        @mkdir($tempFolder . 'chunks', 0777, true);

        // call the qqUploader
        $uploader = new qqFileUploader();
        $uploader->allowedExtensions = array('xpi', 'zip');
        $uploader->sizeLimit = 8 * 1024 * 1024; //maximum file size in bytes
        $uploader->chunksFolder = $tempFolder . 'chunks';

        $result = $uploader->handleUpload($tempFolder);
        $result['filename'] = $uploader->getUploadName();
        $result['project'] = $project;
        $uploadedFile = $tempFolder . $result['filename'];

        // copy the file and delete the temp. folder
        if (copy($uploadedFile, $uploadFolder . '/' . $uploader->getUploadName())) {
            unlink($uploadedFile);
        }
        // return json response
        return Response::json($result);
    }

    public function extract()
    {
        $user_id = Auth::user()->id;
        $archivename = Input::get('archname');
        $upname = Input::get('upname');
        $strXpiUpFilePath = Config::Get('wts.uploadFolder') . $user_id . '/' . $upname;
        $strXpiFilePath = Config::Get('wts.uploadFolder') . $user_id . '/' . $archivename;
        $strWorkingDir = $strXpiFilePath . '_extract';
        @mkdir($strWorkingDir, 0777);
        $objZipFile = new ZipArchive();
        $intErrCode = $objZipFile->open($strXpiUpFilePath);
        if ($intErrCode == true) {
            $objZipFile->extractTo($strWorkingDir);
            $objZipFile->close();
            $response['path'] = $strWorkingDir;
            $response['status'] = 'success';
            $response['message'] = '<div class="alert alert-success" style="margin: 20px 0 0; text-align: center;">' . Trans('appimporter.unpacksuccess', array('archivname' => $archivename)) . '</div>';
        } else {
            switch ($intErrCode) {
                case ZIPARCHIVE::ER_NOZIP:
                    $strError = 'Not a zip archive';
                    break;
                default:
                    $strError = $intErrCode;
            }
            $response['status'] = 'error';
            $response['error'] = $strError;
            $response['message'] = '<div class="alert alert-error" style="margin: 20px 0 0; text-align: center;">' . Trans('appimporter.unpacksuccess', array('archivname' => $archivename)) . ' ' . $strError . '</div>';
            //throw new Exception(sprintf('Failed to uncompress %s: %s', $strXpiFilePath, $strError));
        }
        Utils::RecursiveChmod($strWorkingDir);
        // return json response
        return Response::json($response);
    }

    public function doupload()
    {
        $user_id = Auth::user()->id;
        $strWorkingDir = Input::get('archname');
        $projectId = Input::get('project');
        $uploadPath = Config::Get('wts.uploadFolder') . $user_id . '/';
        $strWorkingDir = Utils::utf8_urldecode($strWorkingDir);
        $strWorkingDir = str_replace($uploadPath, '', $strWorkingDir);
        $response['status'] = 'success';
        $Importer = new MozWebAppImporter($projectId);
        //echo urldecode($strWorkingDir);
        $Importer->import($strWorkingDir);
        $project = $Importer->project->project_id;
        $response['status'] = $Importer->status;
        $response['status'] = 'success';
        foreach ($Importer->messages as $message) {
            $response['message'] .= $message;
        }
        $response['clink'] = '<br/><p align="center"><a href="' . Route('projectparse', array('id' => $project)) . '" class="button radius">Continue</a></p>';
        return Response::json($response);
    }

    private function renderPhpToString($file, $vars = null)
    {
        if (is_array($vars) && !empty($vars)) {
            extract($vars);
        }
        ob_start();
        include app_path() . '/' . $file;
        return ob_get_clean();
    }

    private function utf8_urldecode($str)
    {
        $str = preg_replace("/%u([0-9a-f]{3,4})/i", "&#x\\1;", urldecode($str));
        return html_entity_decode($str, null, 'UTF-8');;
    }
} 