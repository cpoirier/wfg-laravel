<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Query\Expression;

class CreateListingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listings', function (Blueprint $table) {

            $table->bigIncrements('id');

            // Title & Author

            $table->string('title', 120);
            $table->string('author_name', 120);
            $table->bigInteger('user_id')->nullable();
            $table->boolean('user_is_author')->nullable();
            $table->string('slug', 120);

            // Description

            $table->string('tagline', 120);
            $table->text('blurb');

            // Status and advisories

            $table->enum('status', ['gone', 'abandoned', 'ongoing', 'complete'])->charset('ascii');
            $table->enum('graphic_sex'     , ['none', 'some', 'pervasive'])->charset('ascii');
            $table->enum('graphic_violence', ['none', 'some', 'pervasive'])->charset('ascii');
            $table->enum('harsh_language'  , ['none', 'some', 'pervasive'])->charset('ascii');

            // Story URLs

            $table->string('story_home_url')->nullable();
            $table->string('first_page_url')->nullable();

            // Image URLs

            $table->string('cover_image_url' )->nullable();
            $table->string('header_image_url')->nullable();
            $table->string('banner_image_url')->nullable();

            // Timestamps

            $table->timestampsTz();
            $table->softDeletesTz();

            // Search help

            $table->char('title_soundex', 4)->nullable()->charset('ascii');
            $table->char('author_soundex', 4)->nullable()->charset('ascii');

            // Votes

            $table->integer('up_votes');
            $table->integer('down_votes');

            // Keys

            $table->unique('slug');

            // Indexes

            $table->index('title');
            $table->index('title_soundex');
            $table->index('author_name');
            $table->index('author_soundex');
            $table->index(['user_id', 'user_is_author'])
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('listings');
    }
}
