<?php

namespace App\Domain\Interfaces\Dgt\Procedures;

use App\Domain\Entities\DgtProcedure;

interface ProcessRegister
{
    /**
     * @param DgtProcedure $procedure
     * @return DgtProcedure|null
     */
    public function registerNew(DgtProcedure $procedure): ?DgtProcedure;
}
