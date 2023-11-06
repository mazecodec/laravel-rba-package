<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Domain\Enums\RoleUserTypes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    protected $fillable = [
        'name',
        'last_name',
        'email',
        'password',
    ];

    protected $guarded = [];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function isAgentOrAdmin(): bool
    {
        return $this->isAgent() || $this->isAdmin();
    }

    public function isAgent(): bool
    {
        return $this->roles->contains(function ($role) {
            return RoleUserTypes::tryFrom($role->name) === RoleUserTypes::AGENT;
        });
    }

    public function isAdmin(): bool
    {
        return $this->roles->contains(function ($role) {
            return RoleUserTypes::tryFrom($role->name) === RoleUserTypes::ADMIN;
        });
    }

    public function hasRole($role_name): bool
    {
        foreach ($this->roles as $role) {
            //I assumed the column which holds the role name is called role_name
            if (RoleUserTypes::tryFrom($role->name) == $role_name) {
                return true;
            }
        }
        return false;
    }

    public function isClient(): bool
    {
        return $this->roles->contains(function ($role) {
            return RoleUserTypes::tryFrom($role->name) === RoleUserTypes::CLIENT;
        });
    }

    public function clients(): ?HasMany
    {
        if ($this->isAgent() || $this->isClient()) {
            return null;
        }

        return $this->hasMany(User::class, 'parent_id', 'id');
    }


    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }

    public function documents(): HasMany
    {
        return $this->hasMany(UserDocument::class);
    }


    public function authApi(): HasOne
    {
        return $this->hasOne(AuthApi::class);
    }
}
