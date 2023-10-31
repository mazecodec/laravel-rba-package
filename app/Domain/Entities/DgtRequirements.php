<?php

namespace App\Domain\Entities;

class DgtRequirements
{
    private string $code;
    private string $fileExtension;
    private int $fileMaxSize;
    private bool $isAdditional;
}
