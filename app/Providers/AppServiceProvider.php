<?php

namespace App\Providers;

use App\Domain\Interfaces\User\RegisterNewUser;
use App\Domain\Services\UserClient\RegisterUserToDatabase;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        /**
         * @phpstan-ignore-next-line
         *
         * binding:
         * return collect([
         *      'db' => app(RegisterUserToDatabase::class),
         *      'json' => app(RegisterUserToJson::class),
         * ]);
         *
         * usage:
         * $gateway = app(RegisterNewUser::class)->get('db');
         */
        app()->bind(RegisterNewUser::class, function (Application $app) {
            return new RegisterUserToDatabase();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
