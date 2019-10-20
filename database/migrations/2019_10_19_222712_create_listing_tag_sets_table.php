<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListingTagSetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listing_tag_sets', function (Blueprint $table) {
            $table->bigInteger('listing_id');
            $table->bigInteger('tag_id');

            $table->unique(['listing_id', 'tag_id']);
            $table->index(['tag_id', 'listing_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('listing_tag_sets');
    }
}
