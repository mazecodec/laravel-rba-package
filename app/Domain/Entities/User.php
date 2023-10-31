<?php

namespace App\Domain\Entities;

use App\domain\Enums\RoleUserTypes;

class User
{
    private string $name;
    private string $email;
    private string $password;
    private RoleUserTypes $role;
}
