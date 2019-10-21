<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id');
            $table->bigInteger('listing_id')->nullable();
            $table->timestampsTz();
            $table->softDeletes();
            $table->bitInteger('deleted_by')->nullable();

            $table->string('title', 90);
            $table->text('text');
            $table->string('pull_quote', 500);

            $table->string('listing_title_when_reviewed', 255);
            $table->string('listing_author_when_reviewed', 255);
            $table->integer('up_votes');
            $table->integer('down_votes');

            $table->index(['listing_id', 'created_at']);
            $table->index(['author_id', 'updated_at']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}
