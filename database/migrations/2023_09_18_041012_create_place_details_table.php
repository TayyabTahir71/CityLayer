<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('place_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->longText('place_image')->nullable();
            $table->longText('place_description')->nullable();
            $table->longText('obsevation_image')->nullable();
            $table->longText('obsevation_description')->nullable();
            $table->longText('description')->nullable();
            $table->decimal('latitude', 8, 6)->default(0.00)->nullable();
            $table->decimal('longitude', 9, 6)->default(0.00)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('place_details');
    }
};
