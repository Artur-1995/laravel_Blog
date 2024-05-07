<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentPostTable extends Migration
{
    public function up()
    {
        Schema::create('comment_post', function (Blueprint $table) {
            $table->string('comment_id', 255);
            $table->string('post_id', 255);
            $table->foreign('comment_id')->references('id')->on('comments')->onDelete('set null');
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('comment_post');
    }
}
