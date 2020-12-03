<?php

use App\App;
use Core\FileDB;

require '../bootloader.php';

/**
 * If you open /install.php page, all data from db.json is deleted;
 */

App::$db = new FileDB(DB_FILE);

App::$db->createTable('users');
App::$db->insertRow('users', ['email' => 'test@gmail.com', 'password' => 'test']);
App::$db->createTable('tracker');
App::$db->createTable('pixels');