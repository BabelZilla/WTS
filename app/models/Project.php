<?php
/*use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;*/
// Create the projects model
//class Project extends Eloquent implements SluggableInterface {
class Project extends Eloquent
{
    /*use SluggableTrait;

    protected $sluggable = array(
        'build_from' => 'name',
        'save_to'    => 'slug',
    );*/

    protected $table = 'project';
    //public $timestamps = false;
    protected $primaryKey = 'project_id';

    /**
     * Defines the polymophic hasMany / morphMany relationship between Project and Comment
     *
     * @return mixed
     */
    public function comments()
    {
        return $this->morphMany('Fbf\LaravelComments\Comment', 'commentable');
    }

    public function translationssets()
    {
        return $this->hasMany('ProjectTranslationSet', 'project_id', 'project_id');
    }

    public function translators()
    {
        return $this->hasMany('ProjectTranslator', 'project_id', 'project_id');
    }

    public function maintainers()
    {
        return $this->hasMany('ProjectMaintainer', 'project_id', 'project_id');
    }

    public function originalFiles()
    {
        return $this->hasMany('OriginalFile', 'project_id', 'project_id');
    }

    public function originalStrings()
    {
        return $this->hasMany('OriginalString', 'project_id', 'project_id');
    }

    public function Xpifile()
    {
        return $this->hasOne('ProjectXpiFile', 'project_id', 'project_id');
    }

    public function isMaintainer($user_id)
    {
        $isMaintainer = DB::table('project_maintainer')
            ->where('project_id', '=', $this->project_id)
            ->where('user_id', '=', $user_id)
            ->first();
        if ($isMaintainer) {
            return true;
        } else {
            return false;
        }
    }

    public static function countLanguages()
    {
        $languages = DB::table('translation_set')
            ->select('locale', DB::raw('count(*) as total'))
            ->groupBy('locale')
            ->get();
        return count($languages);
    }

    public static function countTranslations()
    {
        $translations = DB::table('translation_set')->count();
        return $translations;
    }

    public function isTranslator($language, $user_id)
    {
        $set = DB::table('translation_set')
            ->where('project_id', '=', $this->project_id)
            ->where('locale', '=', $language)
            ->first();

        $isTranslator = DB::table('translationset_member')
            ->where('translationset_id', '=', $set->translationset_id)
            ->where('user_id', '=', $user_id)
            ->first();
        if ($isTranslator) {
            return $isTranslator->permissions;
        } else {
            return false;
        }
    }

    public function generateUniqueSlug($delimiter = '-')
    {
        $string = strtr(
            $this->name,
            array
            (
                'Š' => 'S',
                'š' => 's',
                'Đ' => 'Dj',
                'đ' => 'dj',
                'Ž' => 'Z',
                'ž' => 'z',
                'Č' => 'C',
                'č' => 'c',
                'Ć' => 'C',
                'ć' => 'c',
                'À' => 'A',
                'Á' => 'A',
                'Â' => 'A',
                'Ã' => 'A',
                'Ä' => 'A',
                'Å' => 'A',
                'Æ' => 'A',
                'Ç' => 'C',
                'È' => 'E',
                'É' => 'E',
                'Ê' => 'E',
                'Ë' => 'E',
                'Ì' => 'I',
                'Í' => 'I',
                'Î' => 'I',
                'Ï' => 'I',
                'Ñ' => 'N',
                'Ò' => 'O',
                'Ó' => 'O',
                'Ô' => 'O',
                'Õ' => 'O',
                'Ö' => 'O',
                'Ø' => 'O',
                'Ù' => 'U',
                'Ú' => 'U',
                'Û' => 'U',
                'Ü' => 'U',
                'Ý' => 'Y',
                'Þ' => 'B',
                'ß' => 'Ss',
                'à' => 'a',
                'á' => 'a',
                'â' => 'a',
                'ã' => 'a',
                'ä' => 'a',
                'å' => 'a',
                'æ' => 'a',
                'ç' => 'c',
                'è' => 'e',
                'é' => 'e',
                'ê' => 'e',
                'ë' => 'e',
                'ì' => 'i',
                'í' => 'i',
                'î' => 'i',
                'ï' => 'i',
                'ð' => 'o',
                'ñ' => 'n',
                'ò' => 'o',
                'ó' => 'o',
                'ô' => 'o',
                'õ' => 'o',
                'ö' => 'o',
                'ø' => 'o',
                'ù' => 'u',
                'ú' => 'u',
                'û' => 'u',
                'ý' => 'y',
                'ý' => 'y',
                'þ' => 'b',
                'ÿ' => 'y',
                'Ŕ' => 'R',
                'ŕ' => 'r',
            )
        );
        $slug = $this->url_title($string, $delimiter, true) . '-' . $this->user_id;
        return $slug;
    }

    private function slugExists($slug)
    {
        $cnt = $this::where('slug', '=', $slug)->count();
        return ($cnt > 0) ? true : false;
    }

    public function url_title($str, $separator = '-', $lowercase = false)
    {
        if ($separator === 'dash') {
            $separator = '-';
        } elseif ($separator === 'underscore') {
            $separator = '_';
        }

        $q_separator = preg_quote($separator, '#');

        $trans = array(
            '&.+?;' => '',
            '[^a-z0-9 _-]' => '',
            '\s+' => $separator,
            '(' . $q_separator . ')+' => $separator
        );

        $str = strip_tags($str);
        foreach ($trans as $key => $val) {
            $str = preg_replace('#' . $key . '#i', $val, $str);
        }

        if ($lowercase === true) {
            $str = strtolower($str);
        }
        return trim(trim($str, $separator));
    }
}