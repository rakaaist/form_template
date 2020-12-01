<?php

namespace App;

use Core\FileDB;
use Core\Session;

/**
 * Class App
 */
class App
{
    public static $db;
    public static $session;

    public function __construct()
    {
        self::$db = new FileDB(DB_FILE);
        self::$db->load();
        self::$session = new Session();

        var_dump('class constructor');
    }

    public function __destruct()
    {
        self::$db->save();
        var_dump('class destructor');
    }

}