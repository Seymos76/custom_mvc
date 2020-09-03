<?php


namespace App\Builder;


class House
{
    private int $rooms;

    /**
     * @return int
     */
    public function getRooms(): int
    {
        return $this->rooms;
    }

    /**
     * @param int $rooms
     */
    public function setRooms(int $rooms): void
    {
        $this->rooms = $rooms;
    }
}