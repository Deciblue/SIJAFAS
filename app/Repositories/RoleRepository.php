<?php

namespace App\Repositories;

use App\Models\Role;
use Illuminate\Database\Eloquent\Collection;

class RoleRepository
{
    /**
     * Find role by name.
     */
    public function findByName(string $name): ?Role
    {
        return Role::where('name', $name)->first();
    }

    /**
     * Get all roles.
     */
    public function all(): Collection
    {
        return Role::all();
    }
}
