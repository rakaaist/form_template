<?php

function nav()
{

    if (is_logged_in()) {
        return $nav = [
            'Home' => [
                'link' => '../index.php'
            ],
            'Add' => [
                'link' => '../admin/add.php'
            ],
            'Logout' => [
                'link' => '../logout.php'
            ]
        ];
    } else {
        return $nav = [
            'Home' => [
                'link' => '../index.php'
            ],
            'Register' => [
                'link' => '../register.php'
            ],
            'Login' => [
                'link' => '../login.php'
            ]
        ];
    }
}