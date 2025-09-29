<?php

namespace App\Components\ActivityChart\Enums;

enum ActivityLevel: int
{
    case NONE = 0;
    case LOW = 1;
    case MEDIUM = 2;
    case HIGH = 3;
    case VERY_HIGH = 4;

    public static function fromCount(int $count): self
    {
        $level = (int) min(ceil($count / 4), 4);

        return match ($level) {
            1 => self::LOW,
            2 => self::MEDIUM,
            3 => self::HIGH,
            4 => self::VERY_HIGH,
            default => self::NONE,
        };
    }
}
