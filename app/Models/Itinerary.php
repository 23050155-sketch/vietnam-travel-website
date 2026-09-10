<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItineraryDetail extends Model
{
    protected $primaryKey = 'detail_id';

    protected $fillable = [
        'itinerary_id',
        'destination_id',
        'visit_date',
        'visit_time',
        'order_number',
        'note',
    ];

    public function itinerary()
    {
        return $this->belongsTo(
            Itinerary::class,
            'itinerary_id',
            'itinerary_id'
        );
    }

    public function destination()
    {
        return $this->belongsTo(
            Destination::class,
            'destination_id',
            'destination_id'
        );
    }
}