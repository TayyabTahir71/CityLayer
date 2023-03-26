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
        Schema::create('street', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('name')->nullable();
            $table->longText('image')->nullable();
            $table->decimal('latitude', 8, 6)->default(0.00)->nullable();
            $table->decimal('longitude', 9, 6)->default(0.00)->nullable();
            $table->longText('tags')->nullable();
            $table->longText('opinions')->nullable();
            $table->string('type')->default('street');
            $table->string('feeling')->nullable();
            $table->integer('change')->default(0)->nullable();
            $table->integer('confort')->default(0)->nullable();
            $table->integer('enjoyable')->default(0)->nullable();
            $table->integer('protected')->default(0)->nullable();

            $table->integer('rest')->default(0)->nullable();
            $table->longText('rest_text')->nullable();
            $table->integer('movement')->default(0)->nullable();
            $table->longText('movement_text')->nullable();
            $table->integer('activities')->default(0)->nullable();
            $table->longText('activities_text')->nullable();
            $table->integer('orientation')->default(0)->nullable();
            $table->longText('orientation_text')->nullable();
            $table->integer('weather')->default(0)->nullable();
            $table->longText('weather_text')->nullable();
            $table->integer('facilities')->default(0)->nullable();
            $table->longText('facilities_text')->nullable();
            $table->integer('noise')->default(0)->nullable();
            $table->longText('noise_text')->nullable();

            $table->integer('beauty')->default(0)->nullable();
            $table->longText('beauty_text')->nullable();
            $table->integer('seasonality')->default(0)->nullable();
            $table->longText('seasonality_text')->nullable();
            $table->integer('plants')->default(0)->nullable();
            $table->longText('plants_text')->nullable();
            $table->integer('talking')->default(0)->nullable();
            $table->longText('talking_text')->nullable();
            $table->integer('sunlight')->default(0)->nullable();
            $table->longText('sunlight_text')->nullable();
            $table->integer('shade')->default(0)->nullable();
            $table->longText('shade_text')->nullable();
            $table->integer('interesting')->default(0)->nullable();
            $table->longText('interesting_text')->nullable();

            $table->integer('protection')->default(0)->nullable();
            $table->longText('protection_text')->nullable();
            $table->integer('polluants')->default(0)->nullable();
            $table->longText('polluants_text')->nullable();
            $table->integer('night')->default(0)->nullable();
            $table->longText('night_text')->nullable();
            $table->text('hazards')->nullable();
            $table->integer('dangerous')->default(0)->nullable();
            $table->longText('dangerous_text')->nullable();
            $table->integer('protection_harm')->default(0)->nullable();
            $table->longText('protection_harm_text')->nullable();

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
        Schema::dropIfExists('street');
    }
};
