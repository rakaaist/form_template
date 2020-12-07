<?php

use App\App;
use App\Views\BasePage;
use App\Views\Forms\Admin\DeleteForm;
use Core\Views\Form;
use Core\Views\Link;
use Core\Views\Table;

require '../../bootloader.php';

if (!App::$session->getUser()) {
    header("location: /login.php");
    exit();
}

if (Form::action()) {
    $form = new DeleteForm();

    if ($form->validateForm()) {
        App::$db->deleteRow('pixels', $form->values()['row_id']);
    }
}

$rows = App::$db->getRowsWhere('pixels', ['email' => $_SESSION['email']]);

foreach ($rows as $row_id => &$row) {
    unset($row['email']);

    $link = new Link([
        'link' => "/admin/edit.php?id=$row_id",
        'text' => 'Edit'
    ]);

    $form = new DeleteForm();
    $form->fill(['row_id' => $row_id]);
    $row['link'] = $link->render();
    $row['delete'] = $form->render();
}

$table = new Table(
    [
        'rows' => $rows,
        'headers' => [
            'X',
            'Y',
            'Color',
            'Link',
            'Delete'
        ]
    ]
);

$page = new BasePage([
    'title' => 'List',
    'content' => $table->render(),
]);

print $page->render();