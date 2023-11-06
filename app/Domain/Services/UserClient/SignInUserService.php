<?php

namespace App\Domain\Services\UserClient;

use App\Domain\Entities\User;
use App\Domain\Interfaces\User\SignInUser;

class SignInUserService implements SignInUser
{

    /**
     * @inheritDoc
     */
    public function signIn(User $user): void
    {
        // TODO: Implement signIn() method.
    }
}
