<?php

namespace Database\Seeders;

use App\Domain\Enums\RoleUserTypes;
use App\Models\Role;
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
        $admin = Role::where('name', RoleUserTypes::ADMIN->stringValue())->first();
        $agent = Role::where('name', RoleUserTypes::AGENT->stringValue())->first();
        $client = Role::where('name', RoleUserTypes::CLIENT->stringValue())->first();

        $userAdmin = User::factory()
            ->create([
                'name' => 'Admin',
                'last_name' => 'Sigadocs',
                'email' => 'admin@test.net',
                'password' => Hash::make('admin'),
            ]);
        $userAdmin->roles()->save($admin);
        $userAdmin->roles()->save($agent);

        User::factory()
            ->create([
                'name' => 'Gestor',
                'last_name' => 'Sigadocs',
                'email' => 'agent@test.net',
                'password' => Hash::make('agent'),
            ])
            ->roles()->save($agent);

        User::factory()
            ->create([
                'name' => 'Cliente',
                'last_name' => 'Sigadocs',
                'email' => 'client@test.net',
                'password' => Hash::make('client'),
            ])
            ->roles()->save($client);

        User::factory()
            ->count(10)
            ->create();
    }
}
