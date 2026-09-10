<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Itinerary extends Model
{
    protected $primaryKey = 'itinerary_id';

    protected $fillable = [
        'user_id',
        'itinerary_name',
        'start_date',
        'end_date',
    ];

    public function user()
    {
        return $this->belongsTo(
            User::class,
            'user_id',
            'user_id'
        );
    }

    public function details()
    {
        return $this->hasMany(
            ItineraryDetail::class,
            'itinerary_id',
            'itinerary_id'
        );
    }
}