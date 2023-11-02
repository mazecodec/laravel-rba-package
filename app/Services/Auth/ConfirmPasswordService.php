<?php

namespace App\Services\Auth;

use Nette\Schema\ValidationException;

class ConfirmPasswordService
{
    public function __invoke(string $password): void
    {
        if (!auth()->guard('web')->validate([
            'email' => auth()->user()->email,
            'password' => $password,
        ])) {
            throw ValidationException::withMessages([
                'password' => __('auth.password'),
            ]);
        }

        session(['auth.password_confirmed_at' => time()]);
    }
}
