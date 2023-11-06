<?php

namespace App\Domain\Interfaces\User;

use App\Domain\Entities\User;

interface DeleteUser
{
    public function delete(User $user): bool;
}
