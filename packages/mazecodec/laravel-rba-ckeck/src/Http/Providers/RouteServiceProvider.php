<?php

namespace Mazecodec\LaravelRbaCheck\Http\Providers;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use Mazecodec\LaravelRbaCheck\Http\Middlewares\RBACheckMiddleware;

class RouteServiceProvider extends ServiceProvider
{
    protected $middlewares = [
        'middlewareName' => RBACheckMiddleware::class,
    ];

    public function boot(Router $router)
    {
        foreach ($this->middlewares as $name => $class) {
            $router->middleware($name, $class);
        }
    }
}
