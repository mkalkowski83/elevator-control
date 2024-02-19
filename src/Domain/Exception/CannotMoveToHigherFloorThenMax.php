<?php
declare(strict_types=1);

namespace ElevatorControl\Domain\Exception;

final class CannotMoveToHigherFloorThenMax extends \DomainException
{
    private function __construct()
    {
        parent::__construct('Cannot move to higher floor then max.');
    }

    public static function create(): self
    {
        return new self();
    }
}