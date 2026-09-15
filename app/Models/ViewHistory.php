<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViewHistory extends Model
{
    use HasFactory;

    protected $table = 'view_history';

    protected $primaryKey = 'view_history_id';

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'place_id',
        'viewed_at',
    ];

    protected $casts = [
        'viewed_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(
            User::class,
            'user_id',
            'user_id'
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