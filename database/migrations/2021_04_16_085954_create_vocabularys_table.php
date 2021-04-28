<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVocabularysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vocabularys', function (Blueprint $table) {
            $table->id();
            $table->integer('id_topic');
            $table->string('vocabulary_name');
            $table->string('vocabulary_image');
            $table->string('vocabulary_audio');
            $table->string('vietsub');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vocabularys');
    }
}
