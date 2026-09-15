<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentMedia extends Model
{
    use HasFactory;

    protected $table = 'comment_media';

    protected $primaryKey = 'comment_media_id';

    public $timestamps = false;

    protected $fillable = [
        'comment_id',
        'media_type',
        'media_path',
        'file_size',
        'sort_order',
        'created_at',
    ];

    public function comment()
    {
        return $this->belongsTo(
            Comment::class,
            'comment_id',
            'comment_id'
        );
    }
}