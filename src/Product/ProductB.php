<?php


namespace App\Product;


class ProductB extends AbstractProduct implements ProductInterface
{
    private const TVA = 0.15;

    public function doStuff(): void
    {
        echo "new ProductB instance";
    }

    public function computeTtc(): float
    {
        return $this->getPricing() + ($this->getPricing() * self::TVA);
    }
}