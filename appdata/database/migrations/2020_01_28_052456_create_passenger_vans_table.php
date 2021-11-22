<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePassengerVansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('passenger_vans', function (Blueprint $table) {
            $table->string('make');
            $table->string('model');
            $table->string('manufature_year');
            $table->string('manufature_month');
            $table->string('body_type');
            $table->string('fuel_type');
            $table->string('gear_box');
            $table->string('doors_number');
            $table->string('damage');
            $table->string('str_wheel');
            $table->string('color');
            $table->string('price');
            $table->string('engn_capacity');
            $table->string('powerNumber');
            $table->string('power_unit');
            $table->string('vin_number');
            $table->string('mileage');
            $table->string('mileage_unit');
            $table->string('seat_number');
            $table->string('drivel_wheel');
            $table->string('wheel_size');
            $table->string('export_price');
            $table->string('climate_contrl');
            $table->string('fuel_consumption_Urban');
            $table->string('fuel_consumption_extra_urban');
            $table->string('fuel_consumption_combined');
            $table->string('euro_stndard');
            $table->string('mot_exp_date');
            $table->string('mot_exp_mnth');
            $table->string('country');
            $table->string('feq_security');
            $table->string('feq_audio_video_equipment');
            $table->string('feq_exterior');
            $table->string('feq_electronics');
            $table->string('feq_interior');
            $table->string('feq_safety');
            $table->string('feq_tuning_improvements');
            $table->string('feq_other_features');
            $table->string('feq_minivan_features');
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
        Schema::dropIfExists('passenger_vans');
    }
}
