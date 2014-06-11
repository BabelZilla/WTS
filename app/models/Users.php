<?php
// Create the ProjectMaintainer model
use Illuminate\Database\Capsule\Manager as Capsule;

class Users extends Eloquent
{
    protected $table = 'ibf_members';
    public $timestamps = false;

    public function ProjectMaintainer()
    {
        return $this->hasMany('ProjectMaintainer', 'user_id', 'id');
    }

    public function Project()
    {
        $projects = DB::table('project_maintainer')
            ->where('user_id', '=', $this->id)
            ->get();
        foreach ($projects as $prj) {
            //print_r($prj);
            $id = $prj->project_id;
            $up[] = Project::find($id);
        }
        return $up;
    }

    public function Translations()
    {
        $projects = DB::table('translationsetmembers')
            ->where('user_id', '=', $this->id)
            ->get();

        foreach ($projects as $prj) {
            $id = $prj->project_id;
            $lang = $prj->language;
            $tSet = DB::table('gp_translation_sets')
                ->where('project_id', '=', $id)
                ->where('locale', '=', $lang)
                ->get();
            //print_r($tSet);
            //die();
            $ts = ProjectTranslationSets::find($tSet[0]->translationset_id);
            $transCnt = $ts->translatedStrings()->count();
            $project = Project::find($id);
            $oStrCnt = $project->originalStrings()->count();
            $up[] = array(
                'project' => Project::find($id),
                'language' => $lang,
                'originalStrings' => $oStrCnt,
                'translatedStrings' => $transCnt,
                'status' => $ts->status
            );
        }
        return $up;
    }
}