<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;

class User extends Authenticatable implements FilamentUser
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin', // optional: restrict admin access
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed', // keeps your current hashed behavior
        'is_admin' => 'boolean',
    ];

    /**
     * Filament admin access check.
     */
    public function canAccessPanel(Panel $panel): bool
    {
        // Option 1: allow all users
        return true;

        // Option 2: allow only admin users
        return $this->is_admin;
    }
}
