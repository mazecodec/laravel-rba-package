<?php

namespace Mazecodec\LaravelRbaCheck\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Mazecodec\LaravelRbaCheck\Connectors\CheckHasRoleConnector;
use Mazecodec\LaravelRbaCheck\Connectors\StoreRoleConnector;
use Mazecodec\LaravelRbaCheck\Models\User;
use Mazecodec\LaravelRbaCheck\Services\CheckUserHasAllowedRoleInterface;
use Mazecodec\LaravelRbaCheck\Services\StoreRolesInterface;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class RoleController
{
    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function index()
    {
        $gateway = app(StoreRolesInterface::class)->get('db');

        $connector = new StoreRoleConnector($gateway);
        $connector->store('USER');

        return 'user stored';
    }

    function mazecodec(CheckHasRoleConnector $connector) {
        $is = $connector->check(Auth::user(), 'user');
        dd($is);
    }
}
