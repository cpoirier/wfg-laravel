<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_points', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id');
            $table->char('reason_code', 12)->charset('ascii');
            $table->bigInteger('subject_id');
            $table->timestampTz('added_at');
            $table->timestampTz('expires_at');
            $table->integer('points');

            $table->unique(['user_id', 'reason_code', 'subject_id']);
            $table->index(['user_id', 'expires_at', 'points']);
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_points');
    }
}
