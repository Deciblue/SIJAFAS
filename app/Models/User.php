<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Role;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * Mass assignable fields
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'firebase_uid',
    ];

    /**
     * Hidden fields for API response
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Attribute casting
     */
    protected $casts = [
        'password' => 'hashed',
    ];

    /**
     * Relation: User belongs to Role
     */
    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * Helper: check role quickly (FOR MIDDLEWARE / API)
     */
    public function hasRole(string $role): bool
    {
        return $this->role && $this->role->name === $role;
    }

    public function assignedWorkOrders()
    {
    return $this->hasMany(
        WorkOrder::class,
        'technician_id'
    );
    }

    public function workOrders()
    {

    return $this->hasMany(
        WorkOrder::class,
        'technician_id'
    );
    }
    
}