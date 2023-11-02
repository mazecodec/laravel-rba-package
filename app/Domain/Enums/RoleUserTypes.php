<?php

namespace App\Domain\Enums;

use App\Domain\Traits\HasArrayValues;
use App\Domain\Traits\HasStringValue;

enum RoleUserTypes: string
{
    use HasArrayValues, HasStringValue;

    case ADMIN = 'ADMIN';
    case GESTOR = 'GESTOR';
    case CLIENTE = 'CLIENTE';
}
