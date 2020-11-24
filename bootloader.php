<?php

define('ROOT', __DIR__);
define('DB_FILE', ROOT.'/app/data/db.json');
define('ITEM_FILE', ROOT.'/app/data/item.json');

require 'core/functions/html.php';
require 'core/functions/form/core.php';
require 'core/functions/form/validators.php';
require 'core/functions/file.php';
require 'app/functions/form/validators.php';
require 'app/functions/auth.php';
require 'app/functions/generators.php';
require 'core/classes/FileDB.php';


session_start();