<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoriesImages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stories_images', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('story_id')->unsigned();
            $table->string('image_name');
            $table->string('image');
            $table->string('image_audio');
            $table->string('vietsub');
            $table->timestamps();

            $table->foreign('story_id')->references('id')->on('stories')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stories_images');
    }
}
