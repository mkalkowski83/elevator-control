<?php
declare(strict_types=1);

namespace ElevatorControl\Domain\Model;

final class Building
{
    /** @var Floor[] */
    private array $floors = [];

    public function __construct(Floor ...$floors)
    {
        $this->floors = $floors;
    }

    public function getFloors(): array
    {
        return $this->floors;
    }

    public function getMinFloor(): Floor
    {
        usort($this->floors, static fn (Floor $a, Floor $b) => $a->value <=> $b->value);

        return $this->floors[0];
    }

    public function getMaxFloor(): Floor
    {
        usort($this->floors, static fn (Floor $a, Floor $b) => $b->value <=> $a->value);

        return $this->floors[0];
    }

    public function florExists(Floor $floorToCheck): bool
    {
        foreach ($this->floors as $floor) {
            if ($floor->value === $floorToCheck->value) {
                return true;
            }
        }

        return false;
    }
}