<?php

/**
 * Roles model config
 */

return array(

    'title' => 'Roles',

    'single' => 'Role',

    'model' => 'role',

    /**
     * The columns array
     *
     * @type array
     */
    'columns' => array(
        'id', 'name', 'role', 'description',
    ),
    /**
     * The edit fields array
     *
     * @type array
     */
    'edit_fields' => array(
        'name' => array(
            'title' => 'Name',
            'type' => 'text',
        ),
        'role' => array(
            'title' => 'Role',
            'type' => 'text'
        ),
        'description' => array(
            'title' => 'Description',
            'type' => 'text'
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