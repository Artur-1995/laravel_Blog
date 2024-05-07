<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommentPost extends Model
{
    protected $fillable = [
        'post_id',
        'comment_id',
    ];

}