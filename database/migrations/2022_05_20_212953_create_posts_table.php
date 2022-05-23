<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{

    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->uuid('id')->unique();
            $table->string('title');
            $table->string('subtitle');
            $table->string('text');
            $table->uuid('id_user');
            $table->uuid('id_post_type');
            $table->timestamps();
        });
        Schema::table('posts', function (Blueprint $table) {
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_post_type')->references('id')->on('post_types');
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
