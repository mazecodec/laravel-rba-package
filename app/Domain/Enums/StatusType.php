<?php

namespace App\Domain\Enums;

use App\Domain\Traits\HasArrayValues;
use App\Domain\Traits\HasStringValue;

enum StatusType: string
{
    use HasArrayValues, HasStringValue;

    case OK = 'OK_PDF';
    case OK_REV = 'OK_REV_PDF';
    case ERR = 'OK_ERR_PDF';
    case REV = 'REV';
}
