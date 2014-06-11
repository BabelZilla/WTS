<?php

// Create the ProjectMaintainer model
class TranslatedString extends Eloquent
{
    protected $table = 'translation';

    //public $timestamps = false;

    public static function boot()
    {
        parent::boot();
        // Setup event bindings...
        TranslatedString::observe(new TranslatedStringObserver);
    }

    public function originalString()
    {
        return $this->hasOne('OriginalString', 'id', 'original_id');
    }

    public function getVersionCount()
    {
        return TranslatedStringVersion::where('id', '=', $this->id)->count();
    }

    public function getOneVersion($versionNumber)
    {
        $versionRecord = TranslatedStringVersion::where('id', '=', $this->id)
            ->where('version', '=', $versionNumber)
            ->first();
        return $versionRecord;
    }

    public function getAllVersions()
    {
        $versionRecords = TranslatedStringVersion::where('id', '=', $this->id)->get();
        //
        /*echo "<pre>";
        print_r(Capsule::getQueryLog());
        echo "</pre>";*/
        return $versionRecords;
    }

    public function getVersion()
    {
        if ($this->version == null) {
            return 0;
        } else {
            return $this->version;
        }
    }

    public function getLastVersions($number = 1)
    {
        $lastVersions = TranslatedStringVersion::where('id', $this->id)
            ->orderBy('version', 'DESC')
            ->take($number)
            ->get();
        if (!empty($lastVersions)) {
            return $lastVersions;
        } else {
            return array();
        }
    }

}