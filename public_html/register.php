<?php

use App\App;
use App\Views\BasePage;
use App\Views\Forms\LoginForm;
use App\Views\Forms\RegisterForm;
use App\Views\Navigation;

require '../bootloader.php';

if (App::$session->getUser()) {
    header("location: /index.php");
    exit();
}

$navigation = new Navigation();

$form = new RegisterForm();

$clean_inputs = $form->values();

if ($form->validateForm()) {
    unset($clean_inputs['password_repeat']);
    App::$db->insertRow('users', $clean_inputs);
    header("location: /login.php");
}

$page = new BasePage([
    'title' => 'Register',
    'content' => $form->render()
]);

print $page->render();
?>
