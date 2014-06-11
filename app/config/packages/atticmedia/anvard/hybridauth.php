<?php
return array(

    //'base_url' => URL::route(Config::get('anvard::routes.login')),

    'providers' => array(

        "Google" => array(
            "enabled" => true,
            "keys" => array("id" => "718047628024-6qcvv5epbnpprl8pfc6jgit1tm1uc7bt.apps.googleusercontent.com", "secret" => "W9FZlP4oAG0Xz7DZnUFN0DHl"),
            "scope" => "https://www.googleapis.com/auth/userinfo.profile https://www.googleapis.com/auth/userinfo.email" // optional
        ),

        'Facebook' => array(
            'enabled' => false,
            'keys' => array('id' => '', 'secret' => ''),
            "scope" => "userinfo_email', 'userinfo_profile", // optional
        ),

        'Twitter' => array(
            'enabled' => true,
            'keys' => array('key' => 'Nz72yDqb00WWzaWd2OZ3mw', 'secret' => '5IPMNKGIA5OucwvMbnoC0cpHYbPfR2VlHQjeTtKRTxw')
        ),

        'LinkedIn' => array(
            'enabled' => false,
            'keys' => array('key' => '', 'secret' => '')
        ),

        'GitHub' => array(
            'enabled' => false,
            'keys' => array('key' => 'd714a2e29cb3cd6f9592', 'secret' => 'a0e49e21bdddc13a899bfc69b1a13106e2f9b440')
        ),
    )
);