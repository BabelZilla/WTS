<?php

// Create the originalStrings model
class OriginalString extends Eloquent
{
    protected $table = 'original';

    public static function boot()
    {
        parent::boot();
        // Setup event bindings...
        OriginalString::observe(new OriginalStringObserver);
    }

    public function translatedStrings()
    {
        return $this->hasMany('TranslatedString', 'original_id', 'id');
    }
}