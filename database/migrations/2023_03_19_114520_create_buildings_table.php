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
        Schema::create('buildings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('name')->nullable();
            $table->longText('image')->nullable();
            $table->decimal('latitude', 8, 6)->default(0.00)->nullable();
            $table->decimal('longitude', 9, 6)->default(0.00)->nullable();
            $table->string('type')->default('building');
            $table->text('tags')->nullable();
            $table->integer('likes')->default(0);
            $table->integer('dislikes')->default(0);
            $table->integer('stars')->default(0);
            $table->integer('bof')->default(0);
            $table->integer('weird')->default(0);
            $table->integer('ohh')->default(0);
            $table->integer('wtf')->default(0);
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
        Schema::dropIfExists('buildings');
    }
};
