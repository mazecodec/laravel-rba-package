<?php

namespace Mazecodec\LaravelRbaCheck\Services;

use Illuminate\Contracts\Auth\Authenticatable;
use Mazecodec\LaravelRbaCheck\Models\Role;

class StoreDatabaseService implements StoreRolesInterface
{

    public function store(Authenticatable $user, string $role): ?Role
    {
        // TODO: Implement store() method.
        return null;
    }
}
