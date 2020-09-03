<?php


namespace App\Product;


interface ProductInterface
{
    public function doStuff(): void;

    public function computeTtc(): float;
}