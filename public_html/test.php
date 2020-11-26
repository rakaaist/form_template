<?php

require '../bootloader.php';

$conditions = [
    'name' => 'Mantas',
    'surname' => 'Samtis'
];

$fileDB = new FileDB(DB_FILE);
$fileDB->setData(['labas']);
$fileDB->getData();
$fileDB->save();
$fileDB->load();
$fileDB->createTable('aiste');
$fileDB->tableExists('labas');
$fileDB->dropTable('labas');
$fileDB->truncateTable('aiste');
$fileDB->save();
$fileDB->load();
$fileDB->insertRow('aiste', ['name' => 'Mantas', 'surname' => 'Samtis'], 3);
$fileDB->insertRow('aiste', ['name' => 'Aiste', 'surname' => 'Samtis'], 1);
$fileDB->insertRow('aiste', ['name' => 'Mantas', 'surname' => 'Samtis'], 0);
$fileDB->insertRow('aiste', ['as'], 3);
$fileDB->save();
$fileDB->load();
$fileDB->getRowsWhere('aiste', $conditions);
$fileDB->getRowWhere('aiste', $conditions);


var_dump($fileDB);
