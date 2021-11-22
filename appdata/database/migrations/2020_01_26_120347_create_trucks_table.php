<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrucksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trucks', function (Blueprint $table) {
           $table->string('truck_type');
           $table->string('manufature_year');
           $table->string('manufature_month');
           $table->string('gross_weight');
           $table->string('kerb_weight');
           $table->string('make');
           $table->string('model');
           $table->string('power');
           $table->string('power_unit');
           $table->string('mileage');
           $table->string('mileage_unit');
           $table->string('price');
           $table->string('vat');
           $table->string('length');
           $table->string('width');
           $table->string('fuel_type');
           $table->string('color');
           $table->string('height');
           $table->string('volume');
           $table->string('layout');
           $table->string('euro_stndard');
           $table->string('lift_capacity');
           $table->string('fuel_tank_capacity');
           $table->string('damage');
           $table->string('new_used');
           $table->string('front_suspension');
           $table->string('rear_suspension');
           $table->string('mot_exp_date');
           $table->string('mot_exp_mnth');
           $table->string('str_wheel');
           $table->string('gear_box');
           $table->string('sleep_bed');
           $table->string('vin_num');
           $table->string('feq_security');
           $table->string('feq_audio_video_equipment');
           $table->string('feq_exterior');
           $table->string('feq_electronics');
           $table->string('feq_interior');
           $table->string('feq_safety');
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
        Schema::dropIfExists('trucks');
    }
}
