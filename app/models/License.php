<?php
// Create the ProjectMaintainer model
use Illuminate\Database\Capsule\Manager as Capsule;

class Licenses extends Illuminate\Database\Eloquent\Model
{
    protected $table = 'wts_licenses';
    public $timestamps = false;
}