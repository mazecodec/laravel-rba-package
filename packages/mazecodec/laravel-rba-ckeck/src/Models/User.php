<?php

namespace Mazecodec\LaravelRbaCheck\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Mazecodec\LaravelRbaCheck\Traits\HasRole;

class User extends Authenticatable
{
    use HasRole;
}
