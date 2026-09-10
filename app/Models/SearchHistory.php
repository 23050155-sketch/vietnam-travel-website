<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SearchHistory extends Model
{
    protected $table = 'search_history';

    protected $primaryKey = 'search_id';

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'keyword',
        'searched_at',
    ];

    public function user()
    {
        return $this->belongsTo(
            User::class,
            'user_id',
            'user_id'
        );
    }
}