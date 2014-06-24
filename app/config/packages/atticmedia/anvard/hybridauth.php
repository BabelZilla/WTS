<?php
return array(

    //'base_url' => URL::route(Config::get('anvard::routes.login')),

    'providers' => array(

        "Google" => array(
            "enabled" => true,
            "keys" => array("id" => "718047628024-qrced5arg5vcajpff1l1ago075fib8mi.apps.googleusercontent.com", "secret" => "hs3z5JHJD1LZ8gkVJ6UHxN5u"),
            "scope" => "https://www.googleapis.com/auth/userinfo.profile https://www.googleapis.com/auth/userinfo.email" // optional
        ),

        'Facebook' => array(
            'enabled' => false,
            'keys' => array('id' => '', 'secret' => ''),
            "scope" => "userinfo_email', 'userinfo_profile", // optional
        ),

        'Twitter' => array(
            'enabled' => true,
            'keys' => array('key' => 'ot5xVNcEJKHtWXUyG0gE0eOte', 'secret' => 'sTXqkUieFIp4b336zNK8LtL5vGl06wn5NhQnVpZf1QbpqEL0sH')
        ),

        'LinkedIn' => array(
            'enabled' => false,
            'keys' => array('key' => '', 'secret' => '')
        ),

        'GitHub' => array(
            'enabled' => true,
            'keys' => array('id' => '29a5e6c3d2f2e85b985d', 'secret' => 'a2e39760cdb988db9154ffae954d172c65175e9e')
        ),
    )
);