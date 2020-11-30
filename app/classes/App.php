<?php

namespace App;

use Core\FileDB;

/**
 * Class App
 */
class App
{
    public static $db;

    public function __construct()
    {
        self::$db = new FileDB(DB_FILE);
        self::$db->load();

        var_dump('class constructor');
    }

    public function __destruct()
    {
        self::$db->save();
        var_dump('class destructor');
    }

}