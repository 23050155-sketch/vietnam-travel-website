<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $primaryKey = 'province_id';

    protected $fillable = [
        'province_name',
        'description',
        'image',
        'region',
    ];

    public function destinations()
    {
        return $this->hasMany(
            Destination::class,
            'province_id',
            'province_id'
        );
    }
}