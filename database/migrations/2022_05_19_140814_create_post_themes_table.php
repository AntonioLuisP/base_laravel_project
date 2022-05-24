<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostThemesTable extends Migration
{
    public function up()
    {
        Schema::create('post_themes', function (Blueprint $table) {
            $table->uuid('id')->unique();
            $table->string('name', 25);
            $table->timestamps();
        });
        Schema::table('post_themes', function (Blueprint $table) {
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('post_themes');
    }
}
