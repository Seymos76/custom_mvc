<?php


namespace App\Command;


class Broker
{
    private array $orderList;

    public function takeOrder(OrderInterface $order)
    {
        $this->orderList[] = $order;
    }

    public function placeOrders()
    {
        /** @var OrderInterface $order */
        foreach ($this->orderList as $order) {
            $order->execute();
        }
        $this->orderList = [];
    }
}