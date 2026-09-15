<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItineraryDetail extends Model
{
    use HasFactory;

    protected $primaryKey = 'itinerary_detail_id';

    public $timestamps = false;

    protected $fillable = [
        'itinerary_id',
        'place_id',
        'visit_date',
        'visit_time',
        'order_number',
        'note',
    ];

    protected $casts = [
        'visit_date' => 'date',
    ];

    public function itinerary()
    {
        return $this->belongsTo(
            Itinerary::class,
            'itinerary_id',
            'itinerary_id'
        );
    }

    public function place()
    {
        return $this->belongsTo(
            Place::class,
            'place_id',
            'place_id'
        );
    }
}