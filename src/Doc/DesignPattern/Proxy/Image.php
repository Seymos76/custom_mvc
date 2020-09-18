<?php


namespace App\Proxy;


class Image implements ImageInterface
{
    private string $fileName;

    public function __construct(string $fileName)
    {
        $this->fileName = $fileName;
        $this->load($fileName);
    }

    private function load(string $fileName)
    {
        echo "Chargement de l'image: $fileName<br>";
    }

    public function display()
    {
        echo "Affichage de l'image: {$this->fileName}<br>";
    }

}