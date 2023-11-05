<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuthApi extends Model
{
    use HasFactory;

    protected $table = 'auth_api';

    protected $fillable = [
        'token',
        'token_expired_at'
    ];

    protected $hidden = [
        'api_key',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
