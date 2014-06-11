<?php
use Illuminate\Database\Capsule\Manager as Capsule;

// Create the ProjectMaintainer model
class Suggestion extends Eloquent
{
    protected $table = 'translation_suggestion';
    //public $timestamps = false;
}