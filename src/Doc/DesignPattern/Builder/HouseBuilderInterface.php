<?php


namespace App\Builder;


interface HouseBuilderInterface
{
    public function reset();

    public function buildRooms(int $rooms);

    public function getResult();

}