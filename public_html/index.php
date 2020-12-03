<?php

use App\App;
use App\Views\BasePage;
use App\Views\Navigation;
use Core\View;

require '../bootloader.php';

$navigation = new Navigation();
$content = new View(
    [
        'title' => 'Home',
        'pixels' => App::$db->getRowsWhere('pixels')
    ]
);

$page = new BasePage([
    'title' => 'Index',
    'content' => $content->render(ROOT . '/app/templates/content/index.tpl.php'),
]);

print $page->render();
?>
