<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buses', function (Blueprint $table) {
          $table->string('bus_type');
          $table->string('seat_num');
          $table->string('eng_capacity');
          $table->string('power');
          $table->string('power_unit');
          $table->string('make');
          $table->string('model');
          $table->string('damage');
          $table->string('mileage');
          $table->string('mileage_unit');
          $table->string('price');
          $table->string('vat');
          $table->string('gross_weight');
          $table->string('kerb_weight');
          $table->string('export_price');
          $table->string('fuel_type');
          $table->string('gear_box');
          $table->string('manufature_year');
          $table->string('manufature_month');
          $table->string('new_used');
          $table->string('climate_contrl');
          $table->string('doors_number');
          $table->string('length');
          $table->string('width');
          $table->string('str_wheel');
          $table->string('vin_num');
          $table->string('euro_stndard');
          $table->string('fuel_tank_capacity');
          $table->string('mot_exp_date');
          $table->string('mot_exp_mnth');
          $table->string('country');
          $table->string('color');
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
        Schema::dropIfExists('buses');
    }
}
