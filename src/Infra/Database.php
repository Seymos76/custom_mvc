<?php

namespace App\Infra;

use \PDO;

class Database
{
    //Nos constantes
    public const DB_HOST = 'mysql:host=localhost;dbname=custom_mvc;charset=utf8';
    public const DB_USER = 'custom_mvc';
    public const DB_PASS = 'customMvc';
    public const DB_NAME = 'custom_mvc';

    protected \PDO $pdo;
    protected static $instance;

    public static function getConnexion(): \PDO
    {
        if (self::$instance === null) {
            $pdo = (new \PDO(self::DB_HOST, self::DB_USER, self::DB_PASS));
            $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            self::$instance = new Database($pdo);
        }
        return self::$instance->pdo;
    }

    /**
     * @return PDO
     */
    public function getPdo(): PDO
    {
        return $this->pdo;
    }

    /**
     * @param PDO $pdo
     */
    public function setPdo(PDO $pdo): void
    {
        $this->pdo = $pdo;
    }

    private function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    private function __clone()
    {
    }
}
