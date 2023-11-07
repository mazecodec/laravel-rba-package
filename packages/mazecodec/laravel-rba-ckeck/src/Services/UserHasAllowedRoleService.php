<?php

namespace Mazecodec\LaravelRbaCheck\Services;

use Exception;
use Illuminate\Contracts\Auth\Authenticatable;

class UserHasAllowedRoleService implements CheckUserHasAllowedRoleInterface
{
    /**
     * @throws Exception
     */
    public function check(Authenticatable|null $user, string $role): bool
    {
        if ($user === null) {
            return false;
        }

        if(!method_exists($user, 'hasRole')){
            throw new \Exception('User class does not have hasRole method');
        }

        return $user->hasRole($role);
    }
}
