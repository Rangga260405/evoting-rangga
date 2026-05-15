<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Vote;
use App\Models\Token;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'nim',
        'email',
        'password',
        'role',
    ];
    protected $attributes = [
        'role' => 'user',
    ];

    /**
     * The attributes that should be hidden.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Attribute casting
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Relasi vote user
     */
    public function vote()
    {
        return $this->hasOne(Vote::class);
    }

    /**
     * Relasi token user
     */
    public function token()
    {
        return $this->hasOne(Token::class);
    }
}
