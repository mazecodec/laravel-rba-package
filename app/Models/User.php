<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Domain\Enums\RoleUserTypes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
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
        'role'
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
        'role' => RoleUserTypes::class
    ];

    public function clients(): ?HasMany
    {
        if ($this->role !== RoleUserTypes::GESTOR) {
            return null;
        }

        return $this->hasMany(User::class, 'parent_id', 'id');
    }



    public function isCliente(): bool
    {
        return $this->role === RoleUserTypes::CLIENTE;
    }

    public function isGestorOrAdmin(): bool
    {
        return $this->isAdmin() || $this->isGestor();
    }

    public function isAdmin(): bool
    {
        return $this->role === RoleUserTypes::ADMIN;
    }

    public function isGestor(): bool
    {
        return $this->role === RoleUserTypes::GESTOR;
    }

    public function isRole(RoleUserTypes $role): bool
    {
        return $this->role === $role;
    }

    /**
     * Interact with the user's first name.
     *
     * @return Attribute
     */
//    protected function role(): Attribute
//    {
//        return new Attribute(
//            get: function ($value) {
//                return RoleUserTypes::from($value);
//            },
//            set: function ($value) {
//                return RoleUserTypes::tryFrom($value);
//            },
//        );
//    }

//    public function roles()
//    {
//        return $this->belongsToMany(Role::class);
//    }
}
