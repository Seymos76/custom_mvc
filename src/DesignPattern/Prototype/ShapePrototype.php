<?php


namespace App\Prototype;


abstract class ShapePrototype
{
    protected string $type;

    protected float $perimeter;

    abstract public function __clone();

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;
        return $this;
    }

    public function getPerimeter(): float
    {
        return $this->perimeter;
    }

    public function setPerimeter(float $perimeter): self
    {
        $this->perimeter = $perimeter;
        return $this;
    }
}