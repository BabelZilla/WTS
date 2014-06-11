<?php

// Create the ProjectMaintainer model
class OriginalString extends Eloquent
{
    protected $table = 'gp_originals';

    public static function boot()
    {
        parent::boot();
        // Setup event bindings...
        OriginalStrings::observe(new originalStringsObserver);
    }

    public function translatedStrings()
    {
        return $this->hasMany('TranslatedStrings', 'original_id', 'id');
    }
}