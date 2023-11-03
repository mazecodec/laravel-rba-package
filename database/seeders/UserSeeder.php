<?php

namespace Database\Seeders;

use App\Domain\Enums\RoleUserTypes;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin',
            'last_name' => 'Sigadocs',
            'email' => 'admin@test.net',
            'password' => Hash::make('password'),
            'role' => RoleUserTypes::ADMIN->stringValue(),
        ]);

        User::factory()->create([
            'name' => 'Gestor',
            'last_name' => 'Sigadocs',
            'email' => 'gestor@test.net',
            'password' => Hash::make('password'),
            'role' => RoleUserTypes::GESTOR->stringValue(),
        ]);

        User::factory()->create([
            'name' => 'Cliente',
            'last_name' => 'Sigadocs',
            'email' => 'cliente@test.net',
            'password' => Hash::make('password'),
            'role' => RoleUserTypes::CLIENTE->stringValue(),
        ]);

        User::factory(10)->create();
    }
}
