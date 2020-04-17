<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhotographiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photographies', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->longText('description')->nullable();
            $table->string('url_photo');
            $table->boolean('cover')->default(false);
            $table->timestamps();

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
        Schema::dropIfExists('photographies');
    }
}
