<?php

class DashboardController extends BaseController
{

    public function __construct()
    {
        parent::__construct();
        /* Only for authenticated users */
        $this->beforeFilter('auth');
        $this->theme->asset()->container('footer')->add('dataTables_js', 'themes/babelzilla/assets/js/jquery.dataTables.min.js');
        $this->theme->asset()->container('footer')->add('dataTablesF_js', 'themes/babelzilla/assets/js/dataTables.foundation.js');
        $this->theme->asset()->container('footer')->add('dashboard_js', 'themes/babelzilla/assets/js/dashboard.js');
    }

    public function Index()
    {
        $uid = Auth::user()->id;
        $user = Auth::user();
        $projects = $user->Project()->get();
        /*      $queries = DB::getQueryLog();
                $last_query = end($queries);
                print_r($last_query);
        */
        $translations = $user->Translations()->get();
        $client = new \Github\Client(
            new \Github\HttpClient\CachedHttpClient(array('cache_dir' => '../github-api-cache'))
        );
        $repositories = $client->api('user')->repositories(Auth::user()->gituser);
        foreach ($repositories as $repo) {
            $repos[$repo['clone_url']] = $repo['name'];
        }
        $repo_html = Form::select('repo', $repos, Null, array('class' => 'reposelect', 'size' => 6));
        $view = array(
            'projects' => $projects,
            'translations' => $translations,
            'repositories' => $repositories,
            'repo_html' => $repo_html,
        );
        $this->theme->breadcrumb()->add(array(
            array(
                'label' => Trans('wts.home'),
                'url' => '/'
            ),
            array(
                'label' => Trans('dashboard.dashboard'),
                'url' => ''
            )
        ));
        // home.index will look up the path 'app/views/home/index.php'
        return $this->theme->of('dashboard.index', $view)->render();
        //return View::make('hello');
    }

    public function Editproject($id)
    {
        $this->beforeFilter('maintainer');
        $project = $this->getProject($id);
        $view = array(
            'project' => $project,
        );
        $this->theme->breadcrumb()->add(array(
            array(
                'label' => Trans('wts.home'),
                'url' => '/'
            ),
            array(
                'label' => Trans('dashboard.dashboard'),
                'url' => route('dashboard'),
            ),
            array('label' => $project->name),
        ));
        return $this->theme->of('dashboard.edit', $view)->render();
    }
}