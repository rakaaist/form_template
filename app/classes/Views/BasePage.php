<?php


namespace App\Views;


use Core\Views\Page;

class BasePage extends Page
{
    public function __construct($data)
    {
        $navigation = new Navigation();

        parent::__construct($data + [
                'css' => [
                    '/media/style.css'
                ],
                'header' => $navigation->render()
            ]);
    }
}