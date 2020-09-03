<?php

namespace App\Product;


abstract class AbstractProductCreator
{
    abstract public static function create(string $type, ?float $pricing): ProductInterface;
}