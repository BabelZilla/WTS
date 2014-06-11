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
        $projects = User::find($uid)->Project();
        $translations = User::find($uid)->Translations();
        $client = new \Github\Client(
            new \Github\HttpClient\CachedHttpClient(array('cache_dir' => '../github-api-cache'))
        );
        $repositories = $client->api('user')->repositories('TheoChevalier');
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
                'label' => 'Home',
                'url' => '/'
            ),
            array(
                'label' => 'Dashboard',
                'url' => 'http://...'
            )
        ));
        // home.index will look up the path 'app/views/home/index.php'
        return $this->theme->of('dashboard.index', $view)->render();
        //return View::make('hello');
    }

    public function Editproject($id)
    {
        $this->beforeFilter('maintainer');
        $project = Project::find($id);
        if (!$project) App::abort(404, 'The requested project does not exist.');
        $view = array(
            'project' => $project,
        );
        $this->theme->breadcrumb()->add(array(
            array(
                'label' => 'Home',
                'url' => '/'
            ),
            array(
                'label' => 'Dashboard',
                'url' => route('dashboard'),
            ),
            array('label' => $project->name),
        ));
        return $this->theme->of('dashboard.edit', $view)->render();
    }
}