<?php

namespace Mazecodec\LaravelRbaCheck\Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Seeders\DgtDocumentRequirementSeeder;
use Database\Seeders\DgtProceduresSeeder;
use Database\Seeders\MessageSeeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\UserDocumentSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
        ]);
    }
}
