<?php

namespace App\Services\Auth;

class LogoutService
{
    public function __invoke(): void
    {
        auth()->guard('web')->logout();

        session()->invalidate();
        session()->regenerateToken();
    }
}
