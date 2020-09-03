<?php

namespace App\Factory;


class ProductFactory extends AbstractProductCreator
{
    public static function create(string $type, ?float $pricing): ProductInterface
    {
        switch ($type) {
            case 'A':
                $product = new ProductA();
                break;
            case 'B':
                $product = new ProductB();
                break;
            default:
                throw new \UnexpectedValueException("Ce type de produit est inconnu");
        }
        $product->setPricing($pricing ?? mt_rand(5,50));
        return $product;
    }
}