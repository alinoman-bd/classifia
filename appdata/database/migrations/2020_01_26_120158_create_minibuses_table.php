<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMinibusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('minibuses', function (Blueprint $table) {
            $table->string('make');
            $table->string('model');
            $table->string('eng_capacity');
            $table->string('power');
            $table->string('power_unit');
            $table->string('minivan_type');
            $table->string('price');
            $table->string('vat');
            $table->string('export_price');
            $table->string('manufature_year');
            $table->string('manufature_month');
            $table->string('fuel_type');
            $table->string('str_wheel');
            $table->string('damage');
            $table->string('seat_number');
            $table->string('gear_box');
            $table->string('gross_weight');
            $table->string('kerb_weight');
            $table->string('new_used');
            $table->string('drivel_wheel');
            $table->string('fuel_tank_capacity');
            $table->string('mot_exp_date');
            $table->string('mot_exp_mnth');
            $table->string('minibus_length');
            $table->string('minibus_height');
            $table->string('mileage');
            $table->string('mileage_unit');
            $table->string('vin_num');
            $table->string('climate_contrl');
            $table->string('euro_stndard');
            $table->string('color');
            $table->string('country');
            $table->string('feq_security');
            $table->string('feq_audio_video_equipment');
            $table->string('feq_exterior');
            $table->string('feq_safety');
            $table->string('feq_electronics');
            $table->string('feq_interior');
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
        Schema::dropIfExists('minibuses');
    }
}
