<?php

// Create the ProjectMaintainer model
class originalFile extends Eloquent
{
    protected $table = 'original_file';
    protected $primaryKey = 'file_id';

    public function originalStrings()
    {
        return $this->hasMany('OriginalString', 'file_id', 'file_id');
    }

    public function TranslatedFiles()
    {
        return $this->hasMany('TranslatedFile', 'original_file', 'file_id');
    }

}