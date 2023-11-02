<?php

namespace App\Domain\Entities;

use App\Domain\Enums\ProcedureType;
use App\Domain\Enums\SigaDocsStatusType;
use App\Domain\Enums\StatusType;

class Procedure
{
    private ProcedureType $type;
    private StatusType $status;
    private SigaDocsStatusType $sigaDocsStatus;
}
