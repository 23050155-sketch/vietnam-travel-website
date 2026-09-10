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

    public function reviews()
    {
        return $this->hasMany(Review::class, 'user_id', 'user_id');
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class, 'user_id', 'user_id');
    }

    public function itineraries()
    {
        return $this->hasMany(Itinerary::class, 'user_id', 'user_id');
    }

    public function searchHistories()
    {
        return $this->hasMany(SearchHistory::class, 'user_id', 'user_id');
    }

    public function viewHistories()
    {
        return $this->hasMany(ViewHistory::class, 'user_id', 'user_id');
    }
}