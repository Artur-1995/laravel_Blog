<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\CommentPost;

class Post extends Model
{
    protected $fillable = [
        'title',
        'content',
        'like_count',
        'dislike_count',
        'created_at',
        'updated_at',
    ];
    public function comments($column = '')
    {
        $comments = $this->belongsToMany(Comment::class);
        if ($column != '') {
            $comments->orderByDesc($column);
        }
        return $comments;
    }
}