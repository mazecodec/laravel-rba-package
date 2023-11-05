<?php

namespace Database\Seeders;

use App\Domain\Enums\RoleUserTypes;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    protected $model = User::class;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()
            ->hasRoles(1, [
                'name' => RoleUserTypes::ADMIN
            ])
            ->create([
                'name' => 'Admin',
                'last_name' => 'Sigadocs',
                'email' => 'admin@test.net',
                'password' => Hash::make('password'),
            ]);

        User::factory()
            ->hasRoles(1, [
                'name' => RoleUserTypes::AGENT
            ])
            ->create([
                'name' => 'Gestor',
                'last_name' => 'Sigadocs',
                'email' => 'gestor@test.net',
                'password' => Hash::make('password'),
            ]);

        User::factory()
            ->hasRoles(1, [
                'name' => RoleUserTypes::CLIENT
            ])
            ->create([
                'name' => 'Cliente',
                'last_name' => 'Sigadocs',
                'email' => 'cliente@test.net',
                'password' => Hash::make('password'),
            ]);

        User::factory()
            ->count(10)
            ->create();
    }
}
