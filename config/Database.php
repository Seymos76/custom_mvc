<?php

namespace App\Config;

use PDO;

class Database
{
    //Nos constantes
    const DB_HOST = 'mysql:host=localhost;dbname=custom_mvc;charset=utf8';
    const DB_USER = 'custom_mvc';
    const DB_PASS = 'customMvc';

    public function getConnexion()
    {
        try {
            $connexion = new PDO(self::DB_HOST, self::DB_USER, self::DB_PASS);
            $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $connexion;
        } catch (\Exception $err) {
            die("Database connexion error: ".$err->getMessage());
        }
    }
}