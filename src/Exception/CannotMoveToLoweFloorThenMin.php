<?php
declare(strict_types=1);

namespace ElevatorControl\Exception;

final class CannotMoveToLoweFloorThenMin extends \DomainException
{
    private function __construct()
    {
        parent::__construct('Cannot move to lower floor then min.');
    }

    public static function create(): self
    {
        return new self();
    }
}