<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewFairsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('review_fairs', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->mediumText('comment')->nullable();
            $table->integer('stars')->default(0);
            $table->timestamps();

            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedInteger('fair_id');
            $table->foreign('fair_id')->references('id')->on('fairs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('review_fairs');
    }
}
