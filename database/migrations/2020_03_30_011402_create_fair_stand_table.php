<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFairStandTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fair_stand', function (Blueprint $table) {
            $table->id();
            $table->mediumText('location');
            $table->string('lat');
            $table->string('long');
            $table->timestamps();

            $table->unsignedInteger('fair_id');
            $table->foreign('fair_id')->references('id')->on('fairs')->onDelete('cascade');
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
        Schema::dropIfExists('fair_stand');
    }
}
