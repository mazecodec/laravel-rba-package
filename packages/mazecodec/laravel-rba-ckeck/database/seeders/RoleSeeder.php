<?php

namespace Mazecodec\LaravelRbaCheck\Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * This is only for testing purposes. Each role are created manually in UserSeeder
     * @see UserSeeder::class
     */
    public function run(): void
    {
        Role::factory()->create([
            'name' => 'ADMIN',
        ]);

        Role::factory()->create([
            'name' => 'PARTNER',
        ]);

        Role::factory()->create([
            'name' => 'USER',
        ]);
    }
}
