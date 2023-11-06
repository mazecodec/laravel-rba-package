<?php

namespace App\Domain\Services\UserClient;

use App\Domain\Entities\User;
use App\Domain\Interfaces\User\RegisterNewUser;

class UserClientAddNewService implements RegisterNewUser
{

    public function registerNewUser(User $user): ?User
    {
        return null;
    }
}
