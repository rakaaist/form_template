<?php

require '../bootloader.php';

$fileDB = new FileDB(DB_FILE);
$fileDB->setData(['labas']);
$fileDB->getData();
$fileDB->save();
$fileDB->load();
$fileDB->createTable('labas');
$fileDB->tableExists('labas');

var_dump($fileDB->tableExists('labas'));