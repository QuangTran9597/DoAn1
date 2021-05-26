<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListenWords extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listen_words', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('listen_audio_id')->unsigned();
            $table->string('word_true');
            $table->string('status_true');
            $table->timestamps();
            $table->string('word_false');
            $table->string('status_false');
            $table->foreign('listen_audio_id')->references('id')->on('listens');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('listen_words');
    }
}
