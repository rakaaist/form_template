<?php

use App\App;
use App\Views\BasePage;
use App\Views\Forms\Admin\AddForm;
use App\Views\Navigation;

require '../../bootloader.php';

if (!App::$session->getUser()) {
    header("location: /login.php");
    exit();
}

$form = new AddForm();

$clean_inputs = $form->values();

if ($form->values()) {
    $clean_inputs['email'] = $_SESSION['email'];
    App::$db->insertRow('pixels', $clean_inputs);
    $message = 'Successful upload of pixel!';
}

$page = new BasePage([
    'title' => 'Register',
    'content' => $form->render()
]);

print $page->render();
?>

