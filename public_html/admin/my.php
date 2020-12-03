<?php

use App\App;
use App\Views\BasePage;
use App\Views\Navigation;
use Core\View;

require '../../bootloader.php';

if (!App::$session->getUser()) {
    header("location: /login.php");
    exit();
}

$navigation = new Navigation();
$content = new View(
    [
        'title' => 'My',
        'pixels' => App::$db->getRowsWhere('pixels', ['email' => $_SESSION['email']])
    ]
);

$page = new BasePage([
    'title' => 'My',
    'content' => $content->render(ROOT . '/app/templates/content/index.tpl.php'),
]);

print $page->render();

?>
