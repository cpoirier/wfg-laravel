<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForumTopicTagSetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forum_topic_tag_sets', function (Blueprint $table) {
            $table->bigInteger('topic_id');
            $table->bigInteger('tag_id');

            $table->unique(['topic_id', 'tag_id']);
            $table->index(['tag_id', 'topic_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('forum_topic_tag_sets');
    }
}
