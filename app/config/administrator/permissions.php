<?php

/**
 * Roles model config
 */

return array(

    'title' => 'Permissions',

    'single' => 'Permission',

    'model' => 'Permission',

    /**
     * The columns array
     *
     * @type array
     */
    'columns' => array(
        'id', 'permission', 'description', 'auto_has',
    ),
    /**
     * The edit fields array
     *
     * @type array
     */
    'edit_fields' => array(
        'prmission' => array(
            'title' => 'Permission',
            'type' => 'text',
        ),
        'description' => array(
            'title' => 'Description',
            'type' => 'text'
        ),
        'auto_has' => array(
            'title' => 'Inherit',
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