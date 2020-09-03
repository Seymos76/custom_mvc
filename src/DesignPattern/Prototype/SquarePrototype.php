<?php


namespace App\Prototype;


class SquarePrototype extends ShapePrototype
{
    public function __construct()
    {
        $this->type = 'Square';
    }

    public function __clone()
    {
        // TODO: Implement __clone() method.
    }
}