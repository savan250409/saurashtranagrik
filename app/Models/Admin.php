<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['name', 'email', 'password'];

    protected $hidden = ['password', 'remember_token'];

    protected function casts(): array
    {
        // 'hashed' makes Eloquent bcrypt the value on assignment, so a password
        // can never be written to the column in plain text.
        return ['password' => 'hashed'];
    }
}
