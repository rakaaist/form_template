<?php

namespace App\Views;

use App\App;
use Core\View;

class Navigation extends View
{
    public function render($template_path = ROOT . '/app/templates/navigation.tpl.php')
    {
        return parent::render($template_path); // TODO: Change the autogenerated stub
    }

    public function __construct()
    {
        parent::__construct($this->generate());
    }

    public function generate()
    {
        if (App::$session->getUser()) {
            return [
                'Home' => [
                    'link' => '../index.php'
                ],
                'Add' => [
                    'link' => '../admin/add.php'
                ],
                'My' => [
                    'link' => '../admin/my.php'
                ],
                'List' => [
                    'link' => '../admin/list.php'
                ],
                'Logout' => [
                    'link' => '../logout.php'
                ]
            ];
        } else {
            return [
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
}