<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('likes', function (Blueprint $table) {
            $table->id();
            // Need ID of the 'liking' user
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            // Post in question (the post that was liked)
            $table->foreignId('post_id')->constrained()->onDelete('cascade');;
            // Data to determine whether a post is liked (0) or disliked (1)
            $table->boolean('liked');
            $table->timestamps();
            $table->unique(['user_id', 'post_id'])
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('likes');
    }
}
