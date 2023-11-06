<?php

namespace App\Domain\Entities;

use App\Domain\Enums\ProcedureType;
use App\Domain\Enums\SigaDocsStatusType;
use App\Domain\Enums\StatusType;

class DgtProcedure
{
    private ProcedureType $type;
    private StatusType $status;
    private SigaDocsStatusType $sigaDocsStatus;

    /**
     * @return ProcedureType
     */
    public function getType(): ProcedureType
    {
        return $this->type;
    }

    /**
     * @param ProcedureType $type
     * @return DgtProcedure
     */
    public function setType(ProcedureType $type): DgtProcedure
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return StatusType
     */
    public function getStatus(): StatusType
    {
        return $this->status;
    }

    /**
     * @param StatusType $status
     * @return DgtProcedure
     */
    public function setStatus(StatusType $status): DgtProcedure
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return SigaDocsStatusType
     */
    public function getSigaDocsStatus(): SigaDocsStatusType
    {
        return $this->sigaDocsStatus;
    }

    /**
     * @param SigaDocsStatusType $sigaDocsStatus
     * @return DgtProcedure
     */
    public function setSigaDocsStatus(SigaDocsStatusType $sigaDocsStatus): DgtProcedure
    {
        $this->sigaDocsStatus = $sigaDocsStatus;
        return $this;
    }
}
