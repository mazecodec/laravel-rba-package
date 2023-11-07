<?php

namespace Mazecodec\LaravelRbaCheck;

use Illuminate\Auth\CreatesUserProviders;
use Illuminate\Support\ServiceProvider;
use Mazecodec\LaravelRbaCheck\Http\Providers\BindServicesProvider;
use Mazecodec\LaravelRbaCheck\Http\Providers\ConfigServiceProvider;
use Mazecodec\LaravelRbaCheck\Http\Providers\RouteServiceProvider;

class RBACheckServiceProvider extends ServiceProvider
{
    use CreatesUserProviders;

    public function boot()
    {
    }

    public function register()
    {
        $this->app->register(BindServicesProvider::class);
        $this->app->register(ConfigServiceProvider::class);
        $this->app->register(RouteServiceProvider::class);

    }
}
