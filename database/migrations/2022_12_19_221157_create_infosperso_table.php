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
        Schema::create('infosperso', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('age')->nullable();
            $table->string('gender')->nullable();
            $table->string('profession')->nullable();
            $table->string('relation')->nullable();
            $table->string('preferences')->nullable();
            $table->integer('score')->nullable();
            $table->string('location')->default('40.50, 8.00')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('infosperso');
    }
};
