<?php

use App\App;

define('ROOT', __DIR__);
define('DB_FILE', ROOT.'/app/data/db.json');

session_start();

require 'core/functions/html.php';
require 'core/functions/form/core.php';
require 'core/functions/form/validators.php';
require 'core/functions/file.php';
require 'app/functions/form/validators.php';
require 'app/functions/auth.php';
require 'app/functions/generators.php';
require 'app/functions/html.php';
require 'vendor/autoload.php';

$app = new App();