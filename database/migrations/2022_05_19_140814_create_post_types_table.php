<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostTypesTable extends Migration
{
    public function up()
    {
        Schema::create('post_types', function (Blueprint $table) {
            $table->uuid('id')->unique();
            $table->string('name', 25);
            $table->string('description')->nullable();
            $table->timestamps();
        });
        Schema::table('post_types', function (Blueprint $table) {
            $table->softDeletes();
        });
    }


    public function down()
    {
        Schema::dropIfExists('post_types');
    }
}
