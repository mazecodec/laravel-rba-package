<?php
namespace App\Services\User;

class DeleteUserService
{
    public function __invoke()
    {
        tap(auth()->user(), fn () => auth()->logout())->delete();

        session()->invalidate();
        session()->regenerateToken();
    }
}
