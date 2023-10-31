<?php

namespace App\Domain\Enums;

enum ProcedureType: string
{
    case MATRICULACION = 'MAT';
    case BAJA = 'BAJ';
    case TRANSFERENCIA = 'TRA';
}
