<?php

namespace App;

final class Direction
{
    const string NORTH = "N";
    const string SOUTH = "S";
    const string WEST = "W";

    public function __construct(private string $direction)
    {
    }

    public function isFacingNorth(): bool
    {
        return $this->direction === self::NORTH;
    }

    public function isFacingSouth(): bool
    {
        return $this->direction === self::SOUTH;
    }

    public function isFacingWest(): bool
    {
        return $this->direction === self::WEST;
    }
}