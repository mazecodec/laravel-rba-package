<?php

namespace App\Domain\Entities;

use App\domain\Enums\ProcedureType;
use App\domain\Enums\SigaDocsStatusType;
use App\domain\Enums\StatusType;

class Procedure
{
    private ProcedureType $type;
    private StatusType $status;
    private SigaDocsStatusType $sigaDocsStatus;
}
