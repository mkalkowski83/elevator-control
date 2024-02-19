<?php
declare(strict_types=1);

namespace ElevatorControl\Domain\Exception;

final class ElevatorIsOnTheTopFloor extends \DomainException
{
    private function __construct()
    {
        parent::__construct('Elevator is on the top floor.');
    }

    public static function create(): self
    {
        return new self();
    }
}