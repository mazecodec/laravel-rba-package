<?php

namespace Mazecodec\LaravelRbaCheck\Services;

use Illuminate\Contracts\Auth\Authenticatable;

interface CheckUserHasAllowedRoleInterface
{
    /**
     * checkUserHasAllowedRole
     * @param Authenticatable|null $user
     * @param string $role
     * @return bool
     */
    public function check(Authenticatable|null $user, string $role): bool;
}
