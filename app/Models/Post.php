<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'title',
        'content',
        'like_count',
        'dislike_count',
        'created_at',
        'updated_at',
    ];
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}