<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentTopicTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment_topic', function (Blueprint $table) {
            $table->integer('comment_id')->unsigned();
            $table->integer('topic_id')->unsigned();
            $table->primary(['comment_id', 'topic_id']);
            $table->foreign('comment_id')->references('id')->on('comments');
            $table->foreign('topic_id')->references('id')->on('topics');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comment_topic');
    }
}
