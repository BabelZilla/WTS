<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | oAuth Config
    |--------------------------------------------------------------------------
    */

    /**
     * Storage
     */
    'storage' => 'Session',

    /**
     * Consumers
     */
    'consumers' => array(

        /**
         * Facebook
         */
        'Facebook' => array(
            'client_id' => '',
            'client_secret' => '',
            'scope' => array(),
        ),
        'Google' => array(
            'client_id' => '718047628024-6qcvv5epbnpprl8pfc6jgit1tm1uc7bt.apps.googleusercontent.com',
            'client_secret' => 'W9FZlP4oAG0Xz7DZnUFN0DHl',
            'scope' => array('userinfo_email', 'userinfo_profile'),
        ),

    )

);