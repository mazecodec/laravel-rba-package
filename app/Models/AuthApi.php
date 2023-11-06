<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AuthApi extends Model
{
    use HasFactory;

    protected $table = 'auth_api';

    protected $fillable = [
        'token',
        'token_expired_at'
    ];

    protected $guarded = [];

    protected $hidden = [
        'api_key',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
