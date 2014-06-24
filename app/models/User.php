<?php

use Zizaco\Confide\ConfideUser;

class User extends ConfideUser
{

    public static $rules = array(
        'username' => 'unique:users,username',
        'email' => 'email'
    );

    public function profiles()
    {
        return $this->hasMany('Profile');
    }

    public function Profile()
    {
        return $this->hasOne('UserProfile', 'user_id', 'id');
    }

    public function Translations()
    {
        return $this->hasMany('ProjectTranslator', 'user_id', 'id');
    }

    public function Project()
    {
        return $this->hasMany('ProjectMaintainer', 'user_id', 'id');
    }

    public function Languages()
    {
        return $this->hasMany('UserLanguage', 'user_id', 'id');
    }

    /**
     * Check to see if current user has given permission
     *
     * @param  string $key
     * @return bool
     */
    public function permission($key)
    {
        return (bool)\Role\Permission::has_permission($key, $this->role_id);
    }

}