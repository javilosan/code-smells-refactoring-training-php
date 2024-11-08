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
        $this->coordinates = new Coordinates($x, $y);
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
                    $this->coordinates = $this->moveAlongY($displacement);
                } else if ($this->isFacingSouth()) {
                    $this->coordinates = $this->moveAlongY(-$displacement);
                } else if ($this->isFacingWest()) {
                    $this->coordinates = $this->moveAlongX(-$displacement);
                } else {
                    $this->coordinates = $this->moveAlongX($displacement);
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

    /**
     * @param int $displacement
     * @return Coordinates
     */
    private function moveAlongY(int $displacement): Coordinates
    {
        return $this->coordinates->moveAlongY($displacement);
    }

    /**
     * @param int $displacement
     * @return Coordinates
     */
    private function moveAlongX(int $displacement): Coordinates
    {
        return $this->coordinates->moveAlongX($displacement);
    }
}