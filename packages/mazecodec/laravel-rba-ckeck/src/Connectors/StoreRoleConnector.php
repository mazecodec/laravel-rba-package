<?php

namespace Mazecodec\LaravelRbaCheck\Connectors;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Mazecodec\LaravelRbaCheck\Models\Role;
use Mazecodec\LaravelRbaCheck\Services\StoreRolesInterface;
use Symfony\Component\HttpKernel\Attribute\WithHttpStatus;

class StoreRoleConnector
{
    protected StoreRolesInterface $storeRoles;
    protected ?Authenticatable $user;

    public function __construct(StoreRolesInterface $storeRoles)
    {
        $this->storeRoles = $storeRoles;
        $this->user = Auth::user();
    }

    public function store(string $role)
    {
        if(!$this->user) {
           abort(Response::HTTP_FORBIDDEN, "User not authenticated found");
        }

        return $this->storeRoles->store($this->user, Role::detox($role));
    }
}
