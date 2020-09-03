<?php


namespace App\Strategy;


class DatabaseWriter implements WriterInterface
{
    public function write($data)
    {
        echo "Envoie les données en base de données<br>";
    }

}