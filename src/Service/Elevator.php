<?php
declare(strict_types=1);

namespace ElevatorControl\Service;

use ElevatorControl\Exception\CannotMoveToLoweFloorThenMin;
use ElevatorControl\Exception\CannotMoveToHigherFloorThenMax;
use ElevatorControl\Exception\ElevatorIsOnTheGroundFloor;
use ElevatorControl\Exception\ElevatorIsOnTheTopFloor;

final class Elevator
{
    private int $currentFloor = 0;

    public function __construct(private readonly int $minFloor, private readonly int $maxFloor)
    {
    }

    public function up(): void
    {
        if ($this->currentFloor + 1 >= $this->maxFloor) {
            throw ElevatorIsOnTheTopFloor::create();
        }

        ++$this->currentFloor;
    }

    public function down(): void
    {
        if ($this->currentFloor - 1 < $this->minFloor) {
            throw ElevatorIsOnTheGroundFloor::create();
        }

        --$this->currentFloor;
    }

    public function currentFloor(): int
    {
        return $this->currentFloor;
    }

    public function moveToFloor(int $floor): void
    {
        if ($floor < $this->minFloor) {
            throw CannotMoveToLoweFloorThenMin::create();
        }

        if ($floor > $this->maxFloor) {
            throw CannotMoveToHigherFloorThenMax::create();
        }

        $this->currentFloor = $floor;
    }
}