<?php

class Role extends Eloquent
{

    protected $table = 'roles';

    /**
     * Dropdown of all roles
     *
     * @return array
     */
    public function dropdown()
    {
        $roles = array();

        foreach (Role::order_by('name', 'asc')->get() as $role) {
            $roles[$role->id] = $role->name;
        }

        return $roles;
    }

}
 