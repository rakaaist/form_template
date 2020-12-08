<?php

use App\Controllers\Admin\PixelController;

require '../../bootloader.php';

$controller = new PixelController();

print $controller->indexEdit();



