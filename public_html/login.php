<?php

use App\Controllers\LoginController;

require '../bootloader.php';

$controller = new LoginController();

print $controller->index();
