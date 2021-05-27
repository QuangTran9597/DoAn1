<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListenWrongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listen_wrongs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('listen_audio_id')->unsigned();
            $table->string('word_false');
            $table->string('status_false');
            $table->timestamps();
            $table->foreign('listen_audio_id')->references('id')->on('listens')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('listen_wrongs');
    }
}
