<?php

namespace App\Domain\Traits;

trait HasArrayValues
{
    public static function toObject(): array
    {
        return array_combine(self::values(), self::names());
    }

    public static function toArray(): array
    {
        return self::values();
    }

    private static function names(): array
    {
        return array_column(self::cases(), 'name');
    }

    private static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
