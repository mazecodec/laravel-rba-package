<?php

namespace Mazecodec\LaravelRbaCheck\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
    use HasFactory;

    protected $table = 'roles';

    protected $fillable = [
        'name',
    ];

    protected $guarded = [
        'id',
    ];

    protected $casts = [
        'name' => 'string',
    ];

    public static function detox(string $role)
    {
        return strtoupper(trim($role));
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
