<?php


namespace App\Prototype;


class CirclePrototype extends ShapePrototype
{
    public function __construct()
    {
        $this->type = 'Circle';
    }

    public function __clone()
    {
        // TODO: Implement __clone() method.
    }
}