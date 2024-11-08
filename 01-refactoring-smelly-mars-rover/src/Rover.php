<?php

declare(strict_types=1);

namespace App;

class Rover
{
    private Direction $direction;
    private Coordinates $coordinates;

    public function __construct(int $x, int $y, string $direction)
    {
        $this->setDirection($direction);
        $this->setCoordinates($x, $y);
    }

    private function setDirection(string $direction): void
    {
        $this->direction = new Direction($direction);
    }

    public function receive(string $commandsSequence): void
    {
        for ($i = 0; $i < strlen($commandsSequence); ++$i) {
            $command = substr($commandsSequence, $i, 1);
            if ($command === "l") {
                // Rotate Rover
                if ($this->isFacingNorth()) {
                    $this->setDirection("W");
                } else if ($this->isFacingSouth()) {
                    $this->setDirection("E");
                } else if ($this->isFacingWest()) {
                    $this->setDirection("S");
                } else {
                    $this->setDirection("N");
                }
            } elseif ($command === "r") {
                // Rotate Rover
                if ($this->isFacingNorth()) {
                    $this->setDirection("E");
                } else if ($this->isFacingSouth()) {
                    $this->setDirection("W");
                } else if ($this->isFacingWest()) {
                    $this->setDirection("N");
                } else {
                    $this->setDirection("S");
                }
            } else {
                // Displace Rover
                $displacement1 = -1;

                if ($command === "f") {
                    $displacement1 = 1;
                }
                $displacement = $displacement1;

                if ($this->isFacingNorth()) {
                    $this->setCoordinates($this->coordinates->x(), $this->coordinates->y() + $displacement);
                } else if ($this->isFacingSouth()) {
                    $this->setCoordinates($this->coordinates->x(), $this->coordinates->y() - $displacement);
                } else if ($this->isFacingWest()) {
                    $this->setCoordinates($this->coordinates->x() - $displacement, $this->coordinates->y());
                } else {
                    $this->setCoordinates($this->coordinates->x() + $displacement, $this->coordinates->y());
                }
            }
        }
    }

    private function isFacingNorth(): bool
    {
        return $this->direction->isFacingNorth();
    }

    private function isFacingSouth(): bool
    {
        return $this->direction->isFacingSouth();
    }

    private function isFacingWest(): bool
    {
        return $this->direction->isFacingWest();
    }

    private function setCoordinates(int $x, int $y): void
    {
        $this->coordinates = new Coordinates($x, $y);
    }
}