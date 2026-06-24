<?php

namespace App\Services\Auth;

use App\Repositories\UserRepository;
use App\Repositories\RoleRepository;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\PersonalAccessToken;
use Symfony\Component\HttpFoundation\Response;

class AuthService
{
    protected $users;
    protected $roles;

    public function __construct(UserRepository $users, RoleRepository $roles)
    {
        $this->users = $users;
        $this->roles = $roles;
    }

    /** Register a new user */
    public function register(array $data)
    {
        $roleName = $data['role'] ?? 'student';
        $role = $this->roles->findByName($roleName);
        if (! $role) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Invalid role.',
                'errors'  => ['role' => ['The selected role is invalid.']],
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $user = $this->users->create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => Hash::make($data['password']),
            'role_id'  => $role->id,
        ]);

        $token = $user->createToken('auth-token')->plainTextToken;

        return response()->json([
            'status'  => 'success',
            'message' => 'User registered successfully.',
            'data'    => [
                'user'  => $user->load('role'),
                'token' => $token,
            ],
        ]);
    }

    /** Login an existing user */
    public function login(array $credentials)
    {
        $user = $this->users->findByEmail($credentials['email']);
        if (! $user || ! Hash::check($credentials['password'], $user->password)) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Invalid credentials.',
                'errors'  => [],
            ], Response::HTTP_UNAUTHORIZED);
        }

        $token = $user->createToken('auth-token')->plainTextToken;

        return response()->json([
            'status'  => 'success',
            'message' => 'Login successful.',
            'data'    => [
                'user'  => $user->load('role'),
                'token' => $token,
            ],
        ]);
    }

    /** Logout – revoke current token */
    public function logout($user, PersonalAccessToken $token)
    {
        $token->delete();
        return response()->json([
            'status'  => 'success',
            'message' => 'Logged out successfully.',
            'data'    => null,
        ]);
    }

    /** Return authenticated user */
    public function me($user)
    {
        return response()->json([
            'status'  => 'success',
            'message' => 'Authenticated user.',
            'data'    => $user->load('role'),
        ]);
    }
}
