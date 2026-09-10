<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ViewHistory extends Model
{
    protected $table = 'view_history';

    protected $primaryKey = 'view_id';

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'destination_id',
        'viewed_at',
    ];

    public function user()
    {
        return $this->belongsTo(
            User::class,
            'user_id',
            'user_id'
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