<?php

class ApiController extends BaseController
{

    /*
    |--------------------------------------------------------------------------
    | Default Api Controller
    |--------------------------------------------------------------------------
    */
    public function __construct()
    {
        parent::__construct();
    }

    public function project($id)
    {
        return Project::find($id)->toJson();
    }

    public function translations($id)
    {
        $project = Project::find($id);
        return $project->translationssets()->get();
    }

    public function translators($id)
    {
        $project = Project::find($id);
        return $project->translators()->get();
    }

    public function maintainers($id)
    {
        //return Project::find($id)->maintainers()->user()->get();
        $project = Project::find($id);
        return $project::with(array('maintainers', 'maintainers.user'))->get();
    }
}