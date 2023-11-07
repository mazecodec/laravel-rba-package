<?php

namespace Mazecodec\LaravelRbaCheck\Http\Providers;

use Illuminate\Auth\CreatesUserProviders;
use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use Mazecodec\LaravelRbaCheck\Database\Seeders\RoleSeeder;

class ConfigServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $_migrationsPath = realpath(__DIR__ . '/../../../database/migrations');
        $_configPath = realpath(__DIR__ . '/../../../config');

        $_configFile = $_configPath . DIRECTORY_SEPARATOR . 'rbac.php';
        $_routeFile = $_configPath . DIRECTORY_SEPARATOR . 'routes.php';

        //  Add our routes...
        if (file_exists($_routeFile)) {
            $this->loadRoutesFrom($_routeFile);
        }

        $this->loadMigrationsFrom($_migrationsPath);
        $this->loadSeeders($seeders = [
            RoleSeeder::class
        ]);

        //  Config
        if (file_exists($_configFile)) {
            $this->publishes([$_configFile => config_path('rbac.php'),], 'config');
        }
    }

    protected function loadSeeders($seed_list){
        $this->callAfterResolving(DatabaseSeeder::class, function ($seeder) use ($seed_list) {
            foreach ((array) $seed_list as $path) {
                $seeder->call($seed_list);
                // here goes the code that will print out in console that the migration was succesful
            }
        });
    }
}
