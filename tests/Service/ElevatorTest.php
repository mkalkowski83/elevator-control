<?php
declare(strict_types=1);

namespace ElevatorControl\Test\Service;

use ElevatorControl\Exception\CannotMoveToHigherFloorThenMax;
use ElevatorControl\Exception\CannotMoveToLoweFloorThenMin;
use ElevatorControl\Exception\ElevatorIsOnTheTopFloor;
use ElevatorControl\Exception\ElevatorIsOnTheGroundFloor;
use ElevatorControl\Service\Elevator;
use PHPUnit\Framework\TestCase;

final class ElevatorTest extends TestCase
{
    /**
     * @test
     */
    public function should_move_up_one_flor(): void
    {
        //Given
        $groundFloor = 0;
        $lastFloor = 12;
        $elevator = new Elevator($groundFloor, $lastFloor);

        //When
        $elevator->up();

        //Then
        $this->assertSame(1, $elevator->currentFloor());
    }

    /**
     * @test
     */
    public function should_move_down_one_flor(): void
    {
        //Given
        $groundFloor = 0;
        $lastFloor = 12;
        $elevator = new Elevator($groundFloor, $lastFloor);

        //When
        $elevator->moveToFloor(1);
        $elevator->down();

        //Then
        $this->assertSame(0, $elevator->currentFloor());
    }

    /**
     * @test
     */
    public function should_not_move_down_when_already_on_the_ground_floor(): void
    {
        // Given
        $groundFloor = 0;
        $lastFloor = 12;
        $elevator = new Elevator($groundFloor, $lastFloor);

        // Expect
        $this->expectException(ElevatorIsOnTheGroundFloor::class);
        $this->assertSame(0, $elevator->currentFloor());

        // When
        $elevator->down();
    }

    /**
     * @test
     */
    public function should_not_move_up_when_already_on_the_top_floor(): void
    {
        // Given
        $groundFloor = 0;
        $lastFloor = 12;
        $elevator = new Elevator($groundFloor, $lastFloor);

        // Expect
        $elevator->moveToFloor(12);
        $this->expectException(ElevatorIsOnTheTopFloor::class);

        // When
        $elevator->up();
    }

    /**
     * @test
     */
    public function should_move_to_direct_floor(): void
    {
        // Given
        $groundFloor = 0;
        $lastFloor = 12;
        $elevator = new Elevator($groundFloor, $lastFloor);

        // When
        $elevator->moveToFloor(5);

        // Then
        $this->assertSame(5, $elevator->currentFloor());
    }

    /**
     * @test
     */
    public function should_not_move_to_lower_floor_then_min(): void
    {
        // Given
        $groundFloor = 0;
        $lastFloor = 12;
        $elevator = new Elevator($groundFloor, $lastFloor);

        // Expect
        $this->expectException(CannotMoveToLoweFloorThenMin::class);

        // When
        $elevator->moveToFloor(-1);
    }

    /**
     * @test
     */
    public function should_not_move_to_higher_floor_then_max(): void
    {
        // Given
        $groundFloor = 0;
        $lastFloor = 12;
        $elevator = new Elevator($groundFloor, $lastFloor);

        // Expect
        $this->expectException(CannotMoveToHigherFloorThenMax::class);

        // When
        $elevator->moveToFloor(13);
    }
}
