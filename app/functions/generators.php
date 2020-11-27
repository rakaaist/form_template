<?php

/**
 * Function generates different nav bar if user is logged in and otherwise;
 *
 * @return array
 */
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

/**
 * Function generates pixel style attributes
 *
 * @param $x
 * @param $y
 * @param $color
 * @return string
 */
function pixel_attr($x, $y, $color)
{
    return "top: {$y}px; left: {$x}px; background-color: $color;";
}