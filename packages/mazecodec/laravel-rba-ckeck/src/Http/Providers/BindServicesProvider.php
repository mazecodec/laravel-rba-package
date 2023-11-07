<?php

namespace Mazecodec\LaravelRbaCheck\Http\Providers;

use Illuminate\Auth\CreatesUserProviders;
use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use Mazecodec\LaravelRbaCheck\Services\CheckUserHasAllowedRoleInterface;
use Mazecodec\LaravelRbaCheck\Services\StoreDatabaseService;
use Mazecodec\LaravelRbaCheck\Services\StoreRolesInterface;
use Mazecodec\LaravelRbaCheck\Services\UserHasAllowedRoleService;

class BindServicesProvider extends ServiceProvider
{
    use CreatesUserProviders;

    public function boot()
    {
    }

    public function register()
    {
        app()->bind(CheckUserHasAllowedRoleInterface::class, function (Application $app, $config) {
            return new UserHasAllowedRoleService();
        });

        app()->bind(StoreRolesInterface::class, function (Application $app, $config) {
            return collect([
                'db' => app(StoreDatabaseService::class),
//                'json' => app(StoreJsonService::class),
//                'azure' => app(StoreAzureService::class),
            ]);
        });

//        app()->singleton(User::class, function (Application $app) {
//            $model = config('providers.users.model');
//            $userFinal = new ReflectionClass($model::class);
//        });
    }

}
