<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlaceImage extends Model
{
    use HasFactory;

    protected $primaryKey = 'place_image_id';

    protected $fillable = [
        'place_id',
        'image_path',
        'caption',
        'sort_order',
    ];

    public function place()
    {
        return $this->belongsTo(
            Place::class,
            'place_id',
            'place_id'
        );
    }
}