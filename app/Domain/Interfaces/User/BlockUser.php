<?php

namespace App\Domain\Interfaces\User;

use App\Domain\Entities\User;

interface BlockUser
{
    public function block(User $user): void;
}
