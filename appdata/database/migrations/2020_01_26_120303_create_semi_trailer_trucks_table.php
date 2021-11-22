<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSemiTrailerTrucksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('semi_trailer_trucks', function (Blueprint $table) {
           $table->string('make');
            $table->string('model');
            $table->string('kerb_weight');
            $table->string('gross_weight');
            $table->string('price');
            $table->string('vat');
            $table->string('power');
            $table->string('power_unit');
            $table->string('mileage');
            $table->string('mileage_unit');
            $table->string('manufature_year');
            $table->string('manufature_month');
            $table->string('sleep_bed');
            $table->string('front_suspension');
            $table->string('rear_suspension');
            $table->string('new_used');
            $table->string('damage');
            $table->string('mot_exp_date');
            $table->string('mot_exp_mnth');
            $table->string('fuel_tank_capacity');
            $table->string('euro_stndard');
            $table->string('layout');
            $table->string('gear_box');
            $table->string('color');
            $table->string('str_wheel');
            $table->string('vin_num');
            $table->string('semi_trailer_type');
            $table->string('semi_trailer_manufacturer');
            $table->string('semi_trailer_model');
            $table->string('semi_trailer_suspension');
            $table->string('semi_manufature_year');
            $table->string('semi_manufature_month');
            $table->string('semi_mot_exp_date');
            $table->string('mot_exp_mnth');
            $table->string('semi_gross_weight');
            $table->string('semi_kerb_weight');
            $table->string('semi_length');
            $table->string('semi_width');
            $table->string('semi_height');
            $table->string('semi_capacity');
            $table->string('alx_make');
            $table->string('semi_axl_num');
            $table->string('semi_damage');
            $table->string('semi_color');
            $table->string('semi_new_used');
            $table->string('semi_vin_num');
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
        Schema::dropIfExists('semi_trailer_trucks');
    }
}
