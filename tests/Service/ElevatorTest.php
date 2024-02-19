<?php
declare(strict_types=1);

namespace ElevatorControl\Test\Service;

use ElevatorControl\Domain\Model\Building;
use ElevatorControl\Domain\Model\Elevator;
use ElevatorControl\Domain\Exception\CannotMoveToHigherFloorThenMax;
use ElevatorControl\Domain\Exception\CannotMoveToLoweFloorThenMin;
use ElevatorControl\Domain\Exception\ElevatorIsOnTheTopFloor;
use ElevatorControl\Domain\Exception\ElevatorIsOnTheGroundFloor;
use ElevatorControl\Domain\Model\Floor;
use ElevatorControl\Domain\Service\ElevatorControl;
use PHPUnit\Framework\TestCase;

final class ElevatorTest extends TestCase
{
    /**
     * @test
     */
    public function should_move_to_floor(): void
    {
        //Given
        // got to specify floor
        $elevatorControl = new ElevatorControl();

        //When
        $elevator = new Elevator(new Building(Floor::GARAGE, Floor::GROUND_FLOOR, Floor::FIRST_FLOOR, Floor::SECOND_FLOOR));
        $elevatorControl->goToFloor($elevator, Floor::FIRST_FLOOR);

        //Then
        $this->assertSame(Floor::FIRST_FLOOR, $elevator->currentFloor);
    }

    /**
     * @test
     */
    public function should_move_up_one_floor(): void
    {
        //Given
        // got to specify floor
        $elevatorControl = new ElevatorControl();

        //When
        $elevator = new Elevator(new Building(Floor::GARAGE, Floor::GROUND_FLOOR, Floor::FIRST_FLOOR, Floor::SECOND_FLOOR));
        $elevatorControl->up($elevator);

        //Then
        $this->assertSame(Floor::FIRST_FLOOR, $elevator->currentFloor);
    }

    /**
     * @test
     */
    public function should_move_down_one_floor(): void
    {
        //Given
        // got to specify floor
        $elevatorControl = new ElevatorControl();

        //When
        $elevator = new Elevator(new Building(Floor::GARAGE, Floor::GROUND_FLOOR, Floor::FIRST_FLOOR, Floor::SECOND_FLOOR));
        $elevatorControl->down($elevator);

        //Then
        $this->assertSame(Floor::FIRST_FLOOR, $elevator->currentFloor);
    }
}
