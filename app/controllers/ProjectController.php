<?php

class ProjectController extends \BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->theme->asset()->container('footer')->add('dataTables_js', 'themes/babelzilla/assets/js/jquery.dataTables.min.js');
        $this->theme->asset()->container('footer')->add('dataTablesF_js', 'themes/babelzilla/assets/js/dataTables.foundation.js');
    }

    public function deleteAll()
    {
        // remove this function on a live system
        OriginalFile::truncate();
        OriginalString::truncate();
        Project::truncate();
        ProjectMaintainer::truncate();
        ProjectTranslationSet::truncate();
        ProjectTranslator::truncate();
        ProjectXpiFile::truncate();
        Suggestion::truncate();
        TranslatedFile::truncate();
        TranslatedString::truncate();
        TranslatedStringVersion::truncate();
        Utils::RecursiveDelete('/var/www/virtual/babelzilla.org/testing/uploads/repos/1/');
    }

    public function index()
    {
        $projects = Project::all();
        $this->theme->breadcrumb()->add(array(
            array(
                'label' => 'Home',
                'url' => '/'
            ),
            array(
                'label' => 'Project',
                'url' => route('projectlist'),
            ),
        ));

        $view = array(
            'projects' => $projects
        );
        return $this->theme->of('projectlist', $view)->render();
    }

    public function importrepo()
    {
        $user_id = Auth::user()->id;
        $remote = Input::get('giturl');
        if ($remote) {
            $isValidRemote = Gitonomy\Git\Admin::isValidRepository($remote);
        }

        if (!$isValidRemote) return Redirect::to('project/upload')->withErrors(array('invalid' => 'Invalid Repository url'));
        if ($isValidRemote) {
            $info = pathinfo($remote);
            $project = Project::where('remote_url', '=', $remote)->first();
            if ($project) {
                if (!$project->isMaintainer()) {
                    // The uploader is not a Maintainer of this project, so we stop here with a message.

                }
                $path_parts = pathinfo(basename($remote));
                $user_id = Auth::user()->id;
                $repoPath = Config::Get('wts.repoFolder') . $user_id . '/';
                $repository = new Gitonomy\Git\Repository($repoPath . $project->slug);
                $success = $repository->run('pull');

                if (trim($success) === 'Already up-to-date.') {
                    $response['message'] = array('<div class="alert alert-warning" style="margin: 20px 0 0; text-align: center;">' . $success . '<br/>Nothing to update.</div>');
                }
                // Todo: Code for repo update
            } else {
                $repoPath = Config::Get('wts.repoFolder') . $user_id . '/';
                $strWorkingDir = $repoPath . $info['filename'];
                try {
                    $repository = Gitonomy\Git\Admin::cloneTo($repoPath . $info['filename'], $remote, false);
                } catch (Exception $e) {
                    $response['message'] = '<div class="alert alert-error" style="margin: 20px 0 0; text-align: center;">' . $e->getMessage() . '</div>';
                    $view = array('response' => $response);
                    $this->theme->setTitle($Importer->project->name . ' Upload failed');
                    return $this->theme->of('project.result', $view)->render();
                }
                $Importer = new MozWebAppImporter();
                $result = $Importer->Import($strWorkingDir, true, $remote);
                foreach ($Importer->messages as $message) {
                    $response['message'] .= $message;
                }
                $parseLink = '<br/><p align="center"><a href="' . Route('projectparse', array('id' => $Importer->project->slug)) . '" class="button radius">Continue</a></p>';
                $view = array('response' => $response,
                    'parseLink' => $parseLink
                );
                $this->theme->setTitle($Importer->project->name . ' Upload step 2');
                return $this->theme->of('project.result', $view)->render();
            }
        }
    }

    public function download($id)
    {
        $project = $this->getProject($id);
        // todo: get the requested file from the  DB
        return Response::Download('');
    }

    public function parse($id)
    {
        $project = $this->getProject($id);
        $translations = $project->translationssets()->get();
        $view = array('translations' => $translations,
            'project' => $project,
        );
        if ($project->project_type == 3) {
            $Importer = new MozWebAppImporter($id);
        }
        $Importer->CreateTranslationfiles();
        $this->theme->asset()->container('footer')->add('activity_js', 'themes/babelzilla/assets/js/jquery.activity.js');
        $this->theme->asset()->container('footer')->add('parser_js', 'themes/babelzilla/assets/js/parser.js');
        $this->theme->setTitle($project->name . ' Parsing locales');
        return $this->theme->of('project.parse', $view)->render();
    }

    /**
     * Display the translation interface.
     *
     * @return Response
     */

    public function translate($id, $lang, $file, $show = 'all', $page = 1)
    {
        $project = $this->getProject($id);
        $translationSet = $project->translationssets()
            ->where('locale', '=', $lang)
            ->first();
        $OFile = OriginalFile::find($file);
        $TFile = TranslatedFile::where('original_file', '=', $OFile->file_id)
            ->where('language', '=', $lang)
            ->first();
        $file_id = $TFile->file_id;
        $this->theme->setTitle($project->name . ' [' . $lang . '] translation');
        $this->theme->asset()->container('footer')->add('bootstrapm_js', 'themes/babelzilla/assets/js/bootstrap-modal.js');
        $this->theme->asset()->container('footer')->add('bootstrapbtn_js', 'themes/babelzilla/assets/js/bootstrap-button.js');
        $this->theme->asset()->container('footer')->add('bootbox_js', 'themes/babelzilla/assets/js/bootbox.min.js');
        $this->theme->asset()->container('footer')->add('autosize_js', 'themes/babelzilla/assets/js/jquery.autosize.min.js');
        $this->theme->asset()->container('footer')->add('translate_js', 'themes/babelzilla/assets/js/translate.js');

        $this->theme->breadcrumb()->add(array(
            array(
                'label' => 'Home',
                'url' => '/'
            ),
            array(
                'label' => 'Project',
                'url' => route('projectlist'),
            ),
            array(
                'label' => $project->name,
                'url' => route('project', array(
                    'project' => $project->slug,
                )),
            ),
            array(
                'label' => $lang,
                'url' => route('projectfilelist', array(
                    'project' => $project->slug,
                    'language' => $lang,
                )),
            ),
            array(
                'label' => $TFile->file_name,
                'url' => route('projectfilelist'),
            ),
        ));
        $isTranslator = false;
        $isMaintainer = false;
        if (Auth::check()) {
            $uid = Auth::user()->id;
            $isTranslator = $project->isTranslator($lang, $uid);
            $isMaintainer = $project->isMaintainer($uid);
        }

        // Settings for Pagination
        $params = array(
            'type' => 'translate',
            'language' => $lang,
            'project' => $id,
            'file' => $file,
            'show' => $show
        );
        $website = route('translatefile', array(
            'project' => $project->slug,
            'language' => $lang,
            'translate' => $file,
            'show' => $show,
        ));
        $rowsperpage = 20;
        switch ($show) {
            case 'verify':
                $stringCnt = $OFile->originalStrings()
                    ->where('status', '=', 'changed')
                    ->count();

                $pagination = new CSSPagination($stringCnt, $rowsperpage, $website); // create instance object
                $pagination->setPage($page);
                $OriginalStrings = $OFile->originalStrings()
                    ->where('status', '=', 'changed')
                    ->take($rowsperpage)
                    ->skip($pagination->getLimit())
                    ->get();
                $dataProvider = $OriginalStrings;
                $sel = 'to_verify';
                break;
            case 'unapproved':
                $OriginalStrings = $OFile->originalStrings()
                    ->where('status', '<>', 'removed')
                    ->get();
                foreach ($OriginalStrings as $string) {
                    $translatedstr = TranslatedString::where('project_id', '=', $project->project_id)
                        ->where('original_id', '=', $string->id)
                        ->where('language', '=', $lang)
                        ->where('status', '=', 'waiting')
                        ->first();
                    if ($translatedstr) {
                        $include[] = $string->id;
                    }
                }
                $stringCnt = count($include);
                $pagination = new CSSPagination($stringCnt, $rowsperpage, $website); // create instance object
                $pagination->setPage($page);
                $dataProvider = $OFile->originalStrings()
                    ->whereIn('id', $include)
                    ->take($rowsperpage)
                    ->skip($pagination->getLimit())
                    ->get();
                $sel = 'unapproved';
                break;
            case 'untranslated':
                $OriginalStrings = $OFile->originalStrings()
                    ->where('status', '<>', 'removed')
                    ->get();
                foreach ($OriginalStrings as $string) {
                    $translatedstr = TranslatedString::where('project_id', '=', $project->project_id)
                        ->where('original_id', '=', $string->id)
                        ->where('language', '=', $lang)
                        ->first();
                    if (!$translatedstr) {
                        $include[] = $string->id;
                    }
                }
                $stringCnt = count($include);
                $pagination = new CSSPagination($stringCnt, $rowsperpage, $website); // create instance object
                $pagination->setPage($page);
                $dataProvider = $OFile->originalStrings()
                    ->whereIn('id', $include)
                    ->take($rowsperpage)
                    ->skip($pagination->getLimit())
                    ->get();
                //print_r(Capsule::getQueryLog());
                $sel = 'untranslated';
                break;
            case 'translated':
                $OriginalStrings = $OFile->originalStrings()
                    ->where('status', '<>', 'removed')
                    ->get();
                foreach ($OriginalStrings as $string) {
                    $translatedstr = TranslatedString::where('project_id', '=', $project->project_id)
                        ->where('original_id', '=', $string->id)
                        ->where('language', '=', $lang)
                        ->first();
                    if ($translatedstr) {
                        $include[] = $string->id;
                    }
                }
                $stringCnt = count($include);
                $pagination = new CSSPagination($stringCnt, $rowsperpage, $website); // create instance object
                $pagination->setPage($page);

                $dataProvider = $OFile->originalStrings()
                    ->whereIn('id', $include)
                    ->take($rowsperpage)
                    ->skip($pagination->getLimit())
                    ->get();
                $sel = 'translated';
                break;
            default:
                $stringCnt = $OFile->originalStrings()
                    ->where('status', '<>', 'removed')
                    ->count();
                $pagination = new CSSPagination($stringCnt, $rowsperpage, $website); // create instance object
                $pagination->setPage($page);
                $OriginalStrings = $OFile->originalStrings()
                    ->where('status', '<>', 'removed')
                    ->take($rowsperpage)
                    ->skip($pagination->getLimit())
                    ->get();
                $dataProvider = $OriginalStrings;
                $sel = 'total';
                break;
        }
        $ofileID = $OFile->file_id;
        $originalcnt = $OFile->originalStrings()
            ->where('status', '<>', 'removed')
            ->count();
        $reverifycount = $OFile->originalStrings()
            ->where('status', '=', 'changed')
            ->count();
        $translatedcnt = TranslatedString::where('project_id', '=', $project->project_id)
            ->where('language', '=', $lang)
            ->where('original_file', '=', $ofileID)
            ->count();
        $unproofedcount = TranslatedString::where('project_id', '=', $project->project_id)
            ->where('language', '=', $lang)
            ->where('original_file', '=', $ofileID)
            ->where('status', '=', 'waiting')
            ->count();
        $missing = $originalcnt - $translatedcnt;
        $short = Config::get('wts.SHORT_LOCALES');
        $PluralRules = json_decode(file_get_contents(app_path() . '/other/all_plurals.json'));
        $pr = explode('-', $lang);
        $PluralRule = $PluralRules->{$pr[0]};
        $PluralRules = WtsHelper::getRule($lang);
        if (!$PluralRules) {
            $lang = substr($lang, 0, 2);
            $PluralRules = WtsHelper::getRule($lang);
        }
        $view = array(
            'project' => $project,
            'translationSet' => $translationSet,
            'OFile' => $OFile,
            'TFile' => $TFile,
            'file_id' => $file_id,
            'pagination' => $pagination,
            'sel' => $sel,
            'lang' => $lang,
            'file' => $file,
            'show' => $show,
            'page' => $page,
            'originalcnt' => $originalcnt,
            'reverifycount' => $reverifycount,
            'translatedcnt' => $translatedcnt,
            'unproofedcount' => $unproofedcount,
            'missing' => $originalcnt - $translatedcnt,
            'dataProvider' => $dataProvider,
            'PluralRules' => $PluralRules,
            'js_data' => array(
                'hello' => $hello,
                'project_id' => $project->slug,
                'file_id' => $file_id,

            ),
        );
        return $this->theme->of('project.translate', $view)->render();
    }

    /**
     * Display a file listing of the language.
     *
     * @return Response
     */
    public function filelist($id, $lang)
    {
        $project = $this->getProject($id);
        $files = $project->originalFiles()->get();
        $view = array('files' => $files,
            'project' => $project,
            'language' => $lang);
        $this->theme->asset()->container('footer')->add('filelist_js', 'themes/babelzilla/assets/js/filelist.js');
        $this->theme->breadcrumb()->add(array(
            array(
                'label' => 'Home',
                'url' => '/'
            ),
            array(
                'label' => 'Project',
                'url' => route('projectlist'),
            ),
            array(
                'label' => $project->name,
                'url' => route('project', array('project' => $project->slug)),
            ),
            array(
                'label' => $lang,
                'url' => route('projectfilelist'),
            ),
        ));
        $this->theme->setTitle($project->name . ' [' . $lang . ']');
        return $this->theme->of('project.filelist', $view)->render();

    }

    /**
     * Display the upload form
     *
     * @return Response
     */
    public function upload()
    {
        /** No anonymous uploads,
         * check the login
         * and redirect guests to the
         * login page
         */
        if (!Auth::check()) return Redirect::to('user/login');

        $this->theme->asset()->container('footer')->add('fineup_js', 'themes/babelzilla/assets/js/jquery.fineuploader.js');
        $this->theme->asset()->container('footer')->add('activity_js', 'themes/babelzilla/assets/js/jquery.activity.js');
        $this->theme->asset()->container('footer')->add('uploadF_js', 'themes/babelzilla/assets/js/uploadform.js');

        $uid = Auth::user()->id;
        $projects = User::find($uid)->Project();
        $options = array();
        $options[] = "<option value='0'>New upload</option>";
        if ($projects) {
            foreach ($projects as $project) {
                $options[] = "<option value='{$project->id}'>{$project->name}</option>";
            }
        }
        $this->theme->breadcrumb()->add(array(
            array(
                'label' => 'Home',
                'url' => '/'
            ),
            array(
                'label' => 'Upload',
            )
        ));
        $view = array('options' => $options);
        return $this->theme->of('project.upload', $view)->render();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }


    /**
     * Display the specified resource.
     *
     * @return Response
     */
    public function show($id)
    {
        $this->theme->asset()->add('prettyPhoto_css', 'themes/babelzilla/assets/css/prettyPhoto.css');
        $this->theme->asset()->container('footer')->add('prettyPhoto_js', 'themes/babelzilla/assets/js/prettyPhoto.js');
        $this->theme->asset()->container('footer')->add('project_js', 'themes/babelzilla/assets/js/project.js');

        $project = $this->getProject($id);

        $translators = $project->translators()->get();
        $license = $project->license;
        $translationSets = $project->translationssets()->get();
        $search = new MozSearch();
        $answer = $search->searchApp($project->name);
        $answer2 = $search->getAppInfo($project->name);
        $privacy = $search->getPrivacy($search->appInfo['privacy_policy']);
        $maintainers = $project->maintainers()->get();
        $manifest = json_decode($project->webapp_manifest, true);
        $view = array(
            'project' => $project,
            'translators' => $translators,
            'translationSets' => $translationSets,
            'license' => $license,
            'maintainers' => $maintainers,
            'answer' => $answer,
            'answer2' => $answer2,
            'privacy' => $privacy,
            'manifest' => $manifest,
            'search' => $search,
            'board__show_topic_url' => 'index',
        );
        $this->theme->breadcrumb()->add(array(
            array(
                'label' => 'Home',
                'url' => '/'
            ),
            array(
                'label' => 'Project',
                'url' => route('projectlist'),
            ),
            array(
                'label' => $project->name
            )
        ));
        $this->theme->setTitle($project->name);
        return $this->theme->of('project.show', $view)->render();
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @return Response
     */
    public function edit($id)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @return Response
     */
    public function update($id)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
