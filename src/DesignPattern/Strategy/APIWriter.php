<?php


namespace App\Strategy;


class APIWriter implements WriterInterface
{
    public function write($data)
    {
        echo "Envoie les données vers une API externe<br>";
    }

}