<?php

namespace App\Factory;


class ProductA extends AbstractProduct implements ProductInterface
{
    private const TVA = 0.2;

    public function doStuff(): void
    {
        echo "new ProductA instance";
    }

    public function computeTtc(): float
    {
        return $this->getPricing() + ($this->getPricing() * self::TVA);
    }

}