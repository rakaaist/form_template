<?php

function nav(){
    $nav = [];

    if (is_logged_in()) {
        $nav = [
            'Home' => [
                'link' => 'index.php'
            ],
            'Add' => [
                'link' => 'admin/add.php'
            ],
            'Logout' => [
                'link' => 'logout.php'
            ]
        ];
    } else {
        $nav = [
            'Home' => [
                'link' => 'index.php'
            ],
            'Register' => [
                'link' => 'register.php'
            ],
            'Login' => [
                'link' => 'login.php'
            ]
        ];
    }

    return $nav;
}