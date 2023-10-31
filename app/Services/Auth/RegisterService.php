<?php

namespace App\Services\Auth;

use App\Models\User;
use Illuminate\Auth\Events\Registered;

class RegisterService
{
    public function __invoke(array $userValidatedData): void
    {
        $hashPasswordService = new HashPasswordService();
        $userValidatedData['password'] = $hashPasswordService($userValidatedData['password']);

        event(new Registered($user = User::create($userValidatedData)));

        auth()->login($user);
    }

}
