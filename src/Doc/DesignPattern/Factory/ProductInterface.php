<?php


namespace App\Factory;


interface ProductInterface
{
    public function doStuff(): void;

    public function computeTtc(): float;
}