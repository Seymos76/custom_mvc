<?php


namespace App\Proxy;

use App\Proxy\Image;


class ImageProxy implements ImageInterface
{
    private string $fileName;

    private Image $image;

    public function __construct(string $fileName)
    {
        $this->fileName = $fileName;
        $this->image = new Image($fileName);
    }

    public function display()
    {
        if (!$this->image) {
            $this->image = new Image($this->fileName);
        }
        $this->image->display();
    }

}