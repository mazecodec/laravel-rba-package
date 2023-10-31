<?php

namespace App\Domain\Enums;

enum RoleUserTypes: string
{
    case ADMIN = 'ADMIN';
    case GESTOR = 'GESTOR';
    case CLIENTE = 'CLIENTE';
}
