<?php

/**
 * Roles model config
 */

return array(

    'title' => 'Users',

    'single' => 'User',

    'model' => 'user',

    /**
     * The columns array
     *
     * @type array
     */
    'columns' => array(
        'id', 'username', 'email', 'confirmed',
    ),
    /**
     * The edit fields array
     *
     * @type array
     */
    'edit_fields' => array(
        'username' => array(
            'title' => 'Username',
            'type' => 'text',
        ),
        'email' => array(
            'title' => 'email',
            'type' => 'text'
        ),
        'confirmed' => array(
            'title' => 'Confirmed',
            'type' => 'bool'
        ),
    ),
    /**
     * The filter fields
     *
     * @type array
     */
    'filters' => array(
        'id',
        'name' => array(
            'title' => 'Name',
        ),
        'role' => array(
            'title' => 'Role',
        ),
    ),
);