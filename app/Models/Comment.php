<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments'; // Имя таблицы в базе данных
    protected $primaryKey = 'id'; // Первичный ключ

    protected $fillable = [
        'post_id',
        'comment_id',
        'user_id',
        'content',
        'like_count',
        'dislike_count',
        'on_the',
        'created_at',
        'updated_at',
    ];
}