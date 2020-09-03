<?php


namespace App\Builder;


class HouseBuilder implements HouseBuilderInterface
{
    private House $house;

    public function __construct()
    {
        $this->reset();
    }

    public function reset(): self
    {
        $this->house = new House();
        return $this;
    }

    public function buildRooms(int $rooms): self
    {
        $this->house->setRooms($rooms);
        return $this;
    }

    public function getResult(): House
    {
        $house = $this->house;
        $this->reset();
        return $house;
    }

}