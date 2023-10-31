<?php

namespace App\Domain\Enums;

enum StatusType: string
{
    case OK = 'OK_PDF';
    case OK_REV = 'OK_REV_PDF';
    case ERR = 'OK_ERR_PDF';
}
