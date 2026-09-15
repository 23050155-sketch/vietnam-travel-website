<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'user_id';

    protected $fillable = [
        'full_name',
        'email',
        'password',
        'avatar',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'user_id', 'user_id');
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class, 'user_id', 'user_id');
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class, 'user_id', 'user_id');
    }

    public function itineraries()
    {
        return $this->hasMany(Itinerary::class, 'user_id', 'user_id');
    }

    public function viewHistories()
    {
        return $this->hasMany(ViewHistory::class, 'user_id', 'user_id');
    }

    protected function casts(): array
    {
        return [
        'password' => 'hashed',
        ];
    }
}