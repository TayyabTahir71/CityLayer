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
        Schema::create('stats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('street_id')->nullable();
            $table->foreign('street_id')->references('id')->on('street')->onDelete('cascade');
            $table->unsignedBigInteger('openspace_id')->nullable();
            $table->foreign('openspace_id')->references('id')->on('openspaces')->onDelete('cascade');
            $table->unsignedBigInteger('building_id')->nullable();
            $table->foreign('building_id')->references('id')->on('buildings')->onDelete('cascade');
            $table->integer('likes')->default(0);
            $table->integer('dislikes')->default(0);
            $table->integer('stars')->default(0);
            $table->integer('bof')->default(0);
            $table->integer('weird')->default(0);
            $table->integer('ohh')->default(0);
            $table->integer('wtf')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stats');
    }
};
