<?php


namespace App\Command;


class Stock
{
    private string $name = "Produit X";
    private int $quantity;

    public function __construct(?int $quantity)
    {
        if (null !== $quantity && is_int($quantity)) {
            $this->quantity = $quantity;
        }
        echo "We have ". $this->name . " in ". $this->quantity ."<br>";
    }
    public function buy()
    {
        $this->quantity++;
        echo "Stock [ Name: ". $this->name .", Quantity: ". $this->quantity ." ] bought<br>";
    }

    public function sell()
    {
        $this->quantity--;
        echo "Stock [ Name: " .$this->name .", Quantity: ". $this->quantity ." ] sold<br>";
    }
}