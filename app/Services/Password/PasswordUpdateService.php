<?php

namespace App\Services\Password;

use App\Services\Auth\HashPasswordService;

class PasswordUpdateService
{
    public function __invoke(string $password): void
    {
        $hashPasswordService = new HashPasswordService();
        $passwordHash = $hashPasswordService($password);

        auth()->user()->update([
            'password' => $passwordHash,
        ]);
    }
}
