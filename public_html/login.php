<?php

use App\App;
use App\Views\BasePage;
use App\Views\Forms\LoginForm;
use App\Views\Navigation;

require '../bootloader.php';

if (App::$session->getUser()) {
    header("location: /index.php");
    exit();
}

$form = new LoginForm();

if ($form->validateForm()) {
    $clean_inputs = $form->values();
    App::$session->login($clean_inputs['email'], $clean_inputs['password']);
    header("location: /admin/add.php");
}

$page = new BasePage([
    'title' => 'Login',
    'content' => $form->render()
]);

print $page->render();
?>

