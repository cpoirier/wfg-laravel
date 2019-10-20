<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForumTopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forum_topics', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 100);
            $table->string('slug' , 120);
            $table->bigInteger('forum_id');
            $table->bigInteger('poster_id');
            $table->boolean('is_open');
            $table->timestampsTz();
            $table->softDeletesTz();
            $table->bigInteger('first_post_id');
            $table->bigInteger('last_post_id');
            $table->integer('post_count');

            $table->unique(['slug']);
            $table->index(['forum_id', 'last_post_id', 'id']);
            $table->index(['poster_id', 'id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('forum_topics');
    }
}
