<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $primaryKey = 'category_id';

    protected $fillable = [
        'category_name',
        'description',
    ];

    public function destinations()
    {
        return $this->belongsToMany(
            Destination::class,
            'destination_categories',
            'category_id',
            'destination_id'
        );
    }
}