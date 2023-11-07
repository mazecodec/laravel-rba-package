<?php

namespace Mazecodec\LaravelRbaCheck\Services;

use Illuminate\Contracts\Auth\Authenticatable;
use Mazecodec\LaravelRbaCheck\Models\Role;

interface StoreRolesInterface
{
    public function store(Authenticatable $user, string $role): ?Role;
}
