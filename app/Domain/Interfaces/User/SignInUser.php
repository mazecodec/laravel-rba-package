<?php

namespace App\Domain\Interfaces\User;

use App\Domain\Entities\User;

interface SignInUser
{
    /**
     * @param User $user
     * @return void
     */
    public function signIn(User $user): void;
}
