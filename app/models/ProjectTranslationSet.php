<?php

// Create the Translationset model
class ProjectTranslationSet extends Eloquent
{
    protected $table = 'translation_set';
    protected $primaryKey = 'translationset_id';

    public function translatedStrings()
    {
        return $this->hasMany('TranslatedString', 'translation_set_id', 'translationset_id');
    }
}