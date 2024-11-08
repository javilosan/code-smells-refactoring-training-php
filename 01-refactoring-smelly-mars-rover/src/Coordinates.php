<?php

namespace App;

final class Coordinates
{

    public function __construct(private int $x, private int $y)
    {
    }

    public function x(): int
    {
        return $this->x;
    }

    public function y(): int
    {
        return $this->y;
    }

    public function moveAlongY(int $displacement): Coordinates
    {
        return new Coordinates(
            $this->x,
            $this->y + $displacement
        );
    }

    public function moveAlongX(int $displacement): Coordinates
    {
        return new Coordinates(
            $this->x + $displacement,
            $this->y
        );
    }
}