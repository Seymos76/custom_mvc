<?php


namespace App\Command;


class BuyStock implements OrderInterface
{
    private Stock $stock;

    public function __construct(Stock $stock)
    {
        $this->stock = $stock;
    }

    public function execute()
    {
        $this->stock->buy();
    }
}