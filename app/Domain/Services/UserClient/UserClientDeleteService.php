<?php

namespace App\Domain\Services\UserClient;

use App\Domain\Entities\User;
use App\Domain\Interfaces\User\DeleteUser;

class UserClientDeleteService implements DeleteUser
{

    public function delete(User $user): bool
    {
        return true;
    }
}
