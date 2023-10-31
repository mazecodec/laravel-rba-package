<?php

namespace App\Domain\Enums;

enum SigaDocsStatusType: string
{
    case SIGADOCS_ENVIADO = 'ENVIADO';
    case SIGADOCS_VALIDADO = 'VALIDADO';
    case SIGADOCS_NOVALIDADO = 'NOVALIDADO';
    case SIGADOCS_RECHAZADO = 'RECHAZADO';
}
