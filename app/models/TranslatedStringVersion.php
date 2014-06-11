<?php

// Create the ProjectMaintainer model
class TranslatedStringVersion extends Eloquent
{
    protected $table = 'translations_version';
    protected $primaryKey = 'version';
}