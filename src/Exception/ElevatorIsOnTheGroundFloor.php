<?php
declare(strict_types=1);

namespace ElevatorControl\Exception;

final class ElevatorIsOnTheGroundFloor extends \DomainException
{
    private function __construct()
    {
        parent::__construct('Elevator is on the ground floor.');
    }

    public static function create(): self
    {
        return new self();
    }
}