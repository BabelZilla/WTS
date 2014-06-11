<?php

// Create the ProjectMaintainer model
class TranslatedFile extends Eloquent
{
    protected $table = 'translation_file';
    protected $primaryKey = 'file_id';

    public function translatedStrings()
    {
        return $this->hasMany('TranslatedString', 'original_file', 'file_id');
    }
}