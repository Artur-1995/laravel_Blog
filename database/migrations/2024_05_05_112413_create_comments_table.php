<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->string('post_id', 255)->nullable();
            $table->string('comment_id', 255)->nullable();
            $table->string('user_id', 255)->nullable();
            $table->text('content')->nullable();
            $table->integer('like_count')->nullable();
            $table->integer('dislike_count')->nullable();
            $table->enum('on_the', ['post', 'comment']);
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
