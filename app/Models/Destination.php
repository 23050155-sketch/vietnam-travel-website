<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    protected $primaryKey = 'destination_id';

    protected $fillable = [
        'province_id',
        'destination_name',
        'address',
        'description',
        'image',
        'opening_hours',
        'ticket_price',
    ];

    public function province()
    {
        return $this->belongsTo(
            Province::class,
            'province_id',
            'province_id'
        );
    }

    public function categories()
    {
        return $this->belongsToMany(
            Category::class,
            'destination_categories',
            'destination_id',
            'category_id'
        );
    }

    public function reviews()
    {
        return $this->hasMany(
            Review::class,
            'destination_id',
            'destination_id'
        );
    }

    public function favorites()
    {
        return $this->hasMany(
            Favorite::class,
            'destination_id',
            'destination_id'
        );
    }

    public function itineraryDetails()
    {
        return $this->hasMany(
            ItineraryDetail::class,
            'destination_id',
            'destination_id'
        );
    }

    public function viewHistories()
    {
        return $this->hasMany(
            ViewHistory::class,
            'destination_id',
            'destination_id'
        );
    }
}