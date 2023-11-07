<?php

namespace Mazecodec\LaravelRbaCheck\Traits;

use Exception;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Mazecodec\LaravelRbaCheck\Models\Role;

trait HasRole
{
    /**
     * @param $role
     * @return bool
     * @throws Exception
     */
    public function hasRole($role): bool
    {
        if (!$this->roles) {
            throw new Exception("Roles relation are not set.");
        }

        foreach ($this->roles as $roleItem) {
            if (Role::detox($roleItem->name) === Role::detox($role)) {
                return true;
            }
        }

        return false;
    }

    private function detox(string $string): string
    {
        return strtolower(trim($string));
    }

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }
}
