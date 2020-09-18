<?php


namespace App\Singleton;


use App\Config\Database;

class DatabaseManagerSingleton
{
    private static $instance;

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new static();
        }
        return self::$instance;
    }

    private function __construct()
    {
    }

    private function __clone()
    {
    }
}