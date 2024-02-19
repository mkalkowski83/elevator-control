<?php
declare(strict_types=1);

namespace ElevatorControl\Domain\Exception;

final class FloorDoesNotExistsInTheBuilding extends \DomainException
{
    private function __construct()
    {
        parent::__construct('Given floor does not exists in the building.');
    }

    public static function create(): self
    {
        return new self();
    }
}