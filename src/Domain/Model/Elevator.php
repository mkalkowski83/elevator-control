<?php
declare(strict_types=1);

namespace ElevatorControl\Domain\Model;

final class Elevator
{
    public Floor $currentFloor = Floor::GROUND_FLOOR;

    public function __construct(public Building $building)
    {
    }
}