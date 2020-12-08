<?php

use App\Controllers\Admin\MyController;

require '../../bootloader.php';

$controller = new MyController();

print $controller->index();
