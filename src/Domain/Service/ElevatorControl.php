<?php
declare(strict_types=1);

namespace ElevatorControl\Domain\Service;

use ElevatorControl\Domain\Exception\CannotMoveToHigherFloorThenMax;
use ElevatorControl\Domain\Exception\CannotMoveToLoweFloorThenMin;
use ElevatorControl\Domain\Exception\FloorDoesNotExistsInTheBuilding;
use ElevatorControl\Domain\Model\Elevator;
use ElevatorControl\Domain\Model\Floor;

final class ElevatorControl
{
    public function goToFloor(Elevator $elevator, Floor $floor): void
    {
        if (false === $elevator->building->florExists($floor)) {
            throw FloorDoesNotExistsInTheBuilding::create();
        }

        if ($floor->value > $elevator->building->getMaxFloor()->value) {
            throw CannotMoveToHigherFloorThenMax::create();
        }

        if ($floor->value < $elevator->building->getMinFloor()->value) {
            throw CannotMoveToLoweFloorThenMin::create();
        }

        $elevator->currentFloor = $floor;
    }

    public function up(Elevator $elevator): void
    {
        $nextFloor = $elevator->currentFloor->value + 1;

        $this->goToFloor($elevator, Floor::from($nextFloor));
    }

    public function down(Elevator $elevator) : void
    {
        $prevFloor = $elevator->currentFloor->value - 1;

        $this->goToFloor($elevator, Floor::from($prevFloor));
    }
}