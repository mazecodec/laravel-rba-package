<?php

namespace App\Domain\Enums;

use App\Domain\Traits\HasArrayValues;
use App\Domain\Traits\HasStringValue;

enum ProcedureType: string
{
    use HasArrayValues, HasStringValue;

    case MATRICULACION = 'MAT';
    case BAJA = 'BAJ';
    case TRANSFERENCIA = 'TRA';
}
