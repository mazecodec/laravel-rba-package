<?php

namespace App\Domain\Traits;

trait HasArrayValues
{
    public static function getArrayValues(): array
    {
        return array_column(self::cases(), 'names');
    }
}
