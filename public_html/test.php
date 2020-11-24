<?php

require '../bootloader.php';

$fileDB = new FileDB(DB_FILE);
$fileDB->setData(['labas']);
$fileDB->getData();
$fileDB->save();
$fileDB->load();
$fileDB->createTable('aiste');
$fileDB->tableExists('labas');
$fileDB->dropTable('labas');
$fileDB->truncateTable('aiste');
$fileDB->insertRow('aiste', ['as'], 0);
$fileDB->insertRow('aiste', ['as'], 3);
$fileDB->save();
$fileDB->load();
$fileDB->updateRow('aiste', 3, ['labas']);


var_dump($fileDB);