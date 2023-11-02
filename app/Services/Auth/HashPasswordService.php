<?php

namespace App\Services\Auth;

use Illuminate\Support\Facades\Hash;

class HashPasswordService
{
    public function __invoke(string $password): string
    {
        return Hash::make($password);
    }
}
