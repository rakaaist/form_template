<?php

use App\App;
use App\Views\BasePage;
use App\Views\Forms\Admin\EditForm;

require '../../bootloader.php';

if (!App::$session->getUser()) {
    header("location: /login.php");
    exit();
}

$id = $_GET['id'] ?? null;
$row = App::$db->getRowById('pixels', $id);
unset($row['email']);

$form = new EditForm();
$form->fill($row);

if ($form->validateForm()) {
    $clean_inputs = $form->values();
    $clean_inputs['email'] = $_SESSION['email'];
    App::$db->updateRow('pixels', $id, $clean_inputs);
    $message = 'Successful upload of pixel!';
}

$page = new BasePage([
    'title' => 'Edit',
    'content' => $form->render()
]);

print $page->render();
?>

