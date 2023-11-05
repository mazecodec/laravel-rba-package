<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Domain\Enums\RoleUserTypes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'last_name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function clients(): ?HasMany
    {
        if ($this->isAgent()) {
            return null;
        }

        return $this->hasMany(User::class, 'parent_id', 'id');
    }

    public function isAgent(): bool
    {
        return $this->roles->contains(function ($role) {
            return RoleUserTypes::tryFrom($role->name) === RoleUserTypes::AGENT;
        });
    }

    public function isClient(): bool
    {
        return $this->roles->contains(function ($role) {
            return RoleUserTypes::tryFrom($role->name) === RoleUserTypes::CLIENT;
        });
    }

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }

    public function isAgentOrAdmin(): bool
    {
        return $this->isAgent() || $this->isAdmin();
    }

    public function isAdmin(): bool
    {
        return $this->roles->contains(function ($role) {
            return RoleUserTypes::tryFrom($role->name) === RoleUserTypes::ADMIN;
        });
    }
}
