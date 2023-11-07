<?php

namespace Mazecodec\LaravelRbaCheck\Connectors;

use Illuminate\Contracts\Auth\Authenticatable;
use Mazecodec\LaravelRbaCheck\Services\CheckUserHasAllowedRoleInterface;

/**
 * Class CheckHasRoleConnector
 * @service
 */
class CheckHasRoleConnector
{
    protected CheckUserHasAllowedRoleInterface $checkUserHasAllowedRole;

    public function __construct(CheckUserHasAllowedRoleInterface $checkUserHasAllowedRole)
    {
        $this->checkUserHasAllowedRole = $checkUserHasAllowedRole;
    }

    public function check(Authenticatable $user, string $role): bool
    {
        return $this->checkUserHasAllowedRole->check($user, $role);
    }
}
