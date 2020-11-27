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
 * @param $attr
 * @return string
 */
function pixel_attr($attr)
{
    return "top: {$attr['coordinate_y']}px; left: {$attr['coordinate_x']}px; background-color: {$attr['colour']};";
}