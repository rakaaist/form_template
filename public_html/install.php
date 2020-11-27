<?php
require '../bootloader.php';

/**
 * If you open /install.php page, all data from db.json is deleted;
 */

$file_db = new FileDB(DB_FILE);

$file_db->createTable('users');
$file_db->insertRow('users', ['email' => 'test@gmail.com', 'password' => 'test']);
$file_db->createTable('pixels');
$file_db->save();