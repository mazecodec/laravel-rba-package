<?php

namespace App\Services\User;

use Illuminate\Contracts\Auth\Authenticatable;

class UpdateUserProfileService
{
    public function __invoke(array $userValidatedData): ?Authenticatable
    {
        $user = auth()->user();
        $user->fill($userValidatedData);

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        return $user;
    }

}
