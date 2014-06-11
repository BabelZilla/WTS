<?php

// Create the ProjectMaintainer model
class ProjectMaintainer extends Eloquent
{
    protected $table = 'project_maintainer';
    public $timestamps = false;

    public function project()
    {
        return $this->hasOne('Project', 'project_id', 'project_id');
    }

    public function user()
    {
        return $this->hasOne('User', 'id', 'user_id');
    }
}