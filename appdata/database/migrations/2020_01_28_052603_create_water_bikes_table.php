<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWaterBikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('water_bikes', function (Blueprint $table) {
            $table->string('manufacturer');
            $table->string('model');
            $table->string('seat_num');
            $table->string('new_used');
            $table->string('price');
            $table->string('export_price');
            $table->string('damage');
            $table->string('manufature_year');
            $table->string('manufature_month');
            $table->string('length');
            $table->string('width');
            $table->string('height');
            $table->string('weight');
            $table->string('weight_capacity');
            $table->string('hull_mat');
            $table->string('color');
            $table->string('feq');
            $table->string('description');
            $table->string('image');
            $table->string('video');
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
        Schema::dropIfExists('water_bikes');
    }
}
