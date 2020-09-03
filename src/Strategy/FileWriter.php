<?php


namespace App\Strategy;


class FileWriter implements WriterInterface
{
    public function write($data)
    {
        echo "Envoie les données dans un fichier<br>";
    }
}