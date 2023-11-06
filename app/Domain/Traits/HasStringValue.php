<?php

namespace App\Domain\Traits;

trait HasStringValue
{
    public function stringValue(): ?string
    {
        return $this->value ?? null;
    }
}
