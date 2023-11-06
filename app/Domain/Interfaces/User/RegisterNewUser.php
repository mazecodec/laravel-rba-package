<?php

namespace App\Domain\Interfaces\User;

use App\Domain\Entities\User;

interface RegisterNewUser
{
    public function registerNewUser(User $user): ?User;
}
