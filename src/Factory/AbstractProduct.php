<?php


namespace App\Factory;


abstract class AbstractProduct
{
    protected float $pricing;

    /**
     * @return float
     */
    public function getPricing(): float
    {
        return $this->pricing;
    }

    /**
     * @param float $pricing
     */
    public function setPricing(float $pricing): self
    {
        $this->pricing = $pricing;
        return $this;
    }
}