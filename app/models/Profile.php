<?php

class Profile extends Eloquent
{

    protected $fillable = array('provider', 'user_id');

    public function user()
    {
        return $this->belongsTo('User');
    }
}