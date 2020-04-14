<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewStandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('review_stands', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->mediumText('comment')->nullable();
            $table->integer('stars')->default(0);
            $table->timestamps();

            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedInteger('stand_id');
            $table->foreign('stand_id')->references('id')->on('stands')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('review_stands');
    }
}
