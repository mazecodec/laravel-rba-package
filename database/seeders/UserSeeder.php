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
                'password' => Hash::make('admin'),
            ]);

        User::factory()
            ->hasRoles(1, [
                'name' => RoleUserTypes::AGENT
            ])
            ->create([
                'name' => 'Gestor',
                'last_name' => 'Sigadocs',
                'email' => 'agent@test.net',
                'password' => Hash::make('agent'),
            ]);

        User::factory()
            ->hasRoles(1, [
                'name' => RoleUserTypes::CLIENT
            ])
            ->create([
                'name' => 'Cliente',
                'last_name' => 'Sigadocs',
                'email' => 'client@test.net',
                'password' => Hash::make('client'),
            ]);

        User::factory()
            ->count(10)
            ->create();
    }
}
