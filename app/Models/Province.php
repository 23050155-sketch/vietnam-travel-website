<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    protected $primaryKey = 'province_id';

    protected $fillable = [
        'name',
        'slug',
        'administrative_type',
        'description',
        'cover_image',
    ];

    public function places()
    {
        return $this->hasMany(Place::class, 'province_id', 'province_id');
    }
}