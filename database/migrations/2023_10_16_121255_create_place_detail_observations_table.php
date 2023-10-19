<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlaceDetailObservationsTable extends Migration
{
    public function up()
    {
        Schema::create('place_detail_observations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('place_detail_id');
            $table->unsignedBigInteger('observation_id')->nullable();
            $table->unsignedBigInteger('observation_child_id')->nullable();
            $table->unsignedBigInteger('feeling_id');
            $table->timestamps();

            // Define foreign key constraint
            $table->foreign('place_detail_id')->references('id')->on('place_details');
        });
    }

    public function down()
    {
        Schema::dropIfExists('place_detail_observations');
    }
}
