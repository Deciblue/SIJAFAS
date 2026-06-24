<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class UserRepository
{
    /**
     * Find a user by email.
     */
    public function findByEmail(string $email): ?User
    {
        return User::where('email', $email)->first();
    }

    /**
     * Create a new user.
     */
    public function create(array $data): User
    {
        return User::create($data);
    }

    /**
     * Get all users with role.
     */
    public function all(): Collection
    {
        return User::with('role')->get();
    }
}
