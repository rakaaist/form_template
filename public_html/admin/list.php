<?php

use App\App;
use App\Views\BasePage;
use App\Views\Navigation;
use Core\View;
use Core\Views\Link;
use Core\Views\Table;

require '../../bootloader.php';

if (!App::$session->getUser()) {
    header("location: /login.php");
    exit();
}

$rows = App::$db->getRowsWhere('pixels', ['email' => $_SESSION['email']]);

foreach ($rows as $row_id => &$row) {
    unset($row['email']);
    $link = new Link([
        'link' => "/admin/edit.php?id=$row_id",
        'text' => 'Edit'
    ]);

    $row['link'] = $link->render();
}

$table = new Table(
    [
        'rows' => $rows,
        'headers' => [
            'X',
            'Y',
            'Color',
            'Link'
        ]
    ]
);

$page = new BasePage([
    'title' => 'List',
    'content' => $table->render(),
]);

print $page->render();