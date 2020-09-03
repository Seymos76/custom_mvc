<?php


namespace App\Command;


class SellStock implements OrderInterface
{
    private Stock $stock;

    public function __construct(Stock $stock)
    {
        $this->stock = $stock;
    }

    public function execute()
    {
        $this->stock->sell();
    }
}