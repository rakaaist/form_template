<?php

use App\App;

/**
 * Function generates different nav bar if user is logged in and otherwise;
 *
 * @return array
 */
function nav()
{
    if (App::$session->getUser()) {
        return $nav = [
            'Home' => [
                'link' => '../index.php'
            ],
            'Add' => [
                'link' => '../admin/add.php'
            ],
            'My' => [
                'link' => '../admin/my.php'
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

