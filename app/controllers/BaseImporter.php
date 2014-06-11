<?php
/**
 * Created by PhpStorm.
 * User: jbt
 * Date: 26.04.14
 * Time: 15:09
 */

//namespace WTS;
/**
 * Class BaseImporter
 *
 * @package WTS
 */
class BaseImporter
{

    public $SDK;

    /**
     *
     */
    public function __construct()
    {

    }

    public function getProject($id)
    {
        if (is_numeric($id)) {
            $project = Project::find($id);
        } else {
            $project = Project::where('slug', '=', $id)->first();
        }
        if (!$project) App::abort(404, 'The requested project does not exist.');
        return $project;
    }
}
 