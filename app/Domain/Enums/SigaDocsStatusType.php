<?php

namespace App\Domain\Enums;

use App\Domain\Traits\HasArrayValues;
use App\Domain\Traits\HasStringValue;

enum SigaDocsStatusType: string
{
    use HasArrayValues, HasStringValue;

    case SIGADOCS_ENVIADO = 'ENVIADO';
    case SIGADOCS_VALIDADO = 'VALIDADO';
    case SIGADOCS_NOVALIDADO = 'NOVALIDADO';
    case SIGADOCS_RECHAZADO = 'RECHAZADO';
}
