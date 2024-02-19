<?php
declare(strict_types=1);

namespace ElevatorControl\Domain\Model;

enum Floor: int
{
    case GARAGE = -1;
    case GROUND_FLOOR = 0;
    case FIRST_FLOOR = 1;
    case SECOND_FLOOR = 2;
    case THIRD_FLOOR = 3;
    case FOURTH_FLOOR = 4;
    case FIFTH_FLOOR = 5;
    case SIXTH_FLOOR = 6;
    case SEVENTH_FLOOR = 7;
    case EIGHTH_FLOOR = 8;
    case NINTH_FLOOR = 9;
    case TENTH_FLOOR = 10;
}