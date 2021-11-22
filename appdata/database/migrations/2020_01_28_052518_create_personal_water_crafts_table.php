<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonalWaterCraftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_water_crafts', function (Blueprint $table) {
            $table->string('watercraft_manufacturer');
            $table->string('model');
            $table->string('seat_num');
            $table->string('manufature_year');
            $table->string('manufature_month');
            $table->string('price');
            $table->string('export_price');
            $table->string('new_used');
            $table->string('damage');
            $table->string('length');
            $table->string('width');
            $table->string('height');
            $table->string('weight');
            $table->string('weight_capacity');
            $table->string('eng_capacity');
            $table->string('power');
            $table->string('power_unit');
            $table->string('fuel_type');
            $table->string('fuel_tank_capacity');
            $table->string('eng_type');
            $table->string('cylinder_num');
            $table->string('eng_make');
            $table->string('eng_model');
            $table->string('storage_capacity');
            $table->string('hull_mat');
            $table->string('color');
            $table->string('country');
            $table->string('feq_additional_equipment');
            $table->string('feq_electronics');
            $table->string('feq_other');
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
        Schema::dropIfExists('personal_water_crafts');
    }
}
