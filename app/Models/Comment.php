<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $primaryKey = 'comment_id';

    protected $fillable = [
        'user_id',
        'place_id',
        'parent_comment_id',
        'content',
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

    public function parent()
    {
        return $this->belongsTo(
            Comment::class,
            'parent_comment_id',
            'comment_id'
        );
    }

    public function replies()
    {
        return $this->hasMany(
            Comment::class,
            'parent_comment_id',
            'comment_id'
        );
    }

    public function media()
    {
        return $this->hasMany(
            CommentMedia::class,
            'comment_id',
            'comment_id'
        );
    }
}