<?php


namespace App\Builder;


class Director
{
    private HouseBuilderInterface $builder;

    public function setBuilder(HouseBuilderInterface $builder)
    {
        $this->builder = $builder;
    }

    public function makeHouse(int $rooms)
    {
        $this->builder
            ->reset()
            ->buildRooms($rooms)
        ;
    }

}