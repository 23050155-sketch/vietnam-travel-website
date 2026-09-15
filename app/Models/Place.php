<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;

    protected $primaryKey = 'place_id';

    protected $fillable = [
        'province_id',
        'name',
        'slug',
        'short_description',
        'description',
        'cover_image',
        'address',
        'ticket_price',
        'open_time',
        'close_time',
        'visit_duration_min',
        'best_time',
        'best_months',
        'notes',
        'activities',
        'latitude',
        'longitude',
        'view_count',
        'is_featured',
        'status',
    ];

    public function province()
    {
        return $this->belongsTo(
            Province::class,
            'province_id',
            'province_id'
        );
    }

    public function images()
    {
        return $this->hasMany(
            PlaceImage::class,
            'place_id',
            'place_id'
        );
    }

    public function categories()
    {
        return $this->belongsToMany(
            Category::class,
            'category_place',
            'place_id',
            'category_id'
        );
    }

    public function comments()
    {
        return $this->hasMany(
            Comment::class,
            'place_id',
            'place_id'
        );
    }

    public function ratings()
    {
        return $this->hasMany(
            Rating::class,
            'place_id',
            'place_id'
        );
    }

    public function favorites()
    {
        return $this->hasMany(
            Favorite::class,
            'place_id',
            'place_id'
        );
    }

    public function itineraryDetails()
    {
        return $this->hasMany(
            ItineraryDetail::class,
            'place_id',
            'place_id'
        );
    }

    public function viewHistories()
    {
        return $this->hasMany(
            ViewHistory::class,
            'place_id',
            'place_id'
        );
    }
}