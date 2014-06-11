<?php

class ProjectsController extends \BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->theme->asset()->container('footer')->add('dataTables_js', 'themes/babelzilla/assets/js/jquery.dataTables.min.js');
        $this->theme->asset()->container('footer')->add('dataTablesF_js', 'themes/babelzilla/assets/js/dataTables.foundation.js');
        $this->theme->asset()->container('footer')->add('projectlist_js', 'themes/babelzilla/assets/js/projectlist.js');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
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
        // home.index will look up the path 'app/views/home/index.php'
        return $this->theme->of('projectlist', $view)->render();
        //return View::make('hello');
        //
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
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }


}
