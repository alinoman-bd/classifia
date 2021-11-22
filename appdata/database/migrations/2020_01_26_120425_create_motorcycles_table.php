<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMotorcyclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('motorcycles', function (Blueprint $table) {
            $table->string('make');
            $table->string('model');
            $table->string('eng_capacity');
            $table->string('power');
            $table->string('power_unit');
            $table->string('manufature_year');
            $table->string('manufature_month');
            $table->string('price');
            $table->string('export_price');
            $table->string('motorcycle_type');
            $table->string('cooling_type');
            $table->string('mileage');
            $table->string('mileage_unit');
            $table->string('fuel_type');
            $table->string('damage');
            $table->string('new_used');
            $table->string('mot_exp_date');
            $table->string('mot_exp_mnth');
            $table->string('kerb_weight');
            $table->string('gear_box');
            $table->string('engine_type');
            $table->string('color');
            $table->string('reg_type');
            $table->string('euro_stndard');
            $table->string('country');
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
        Schema::dropIfExists('motorcycles');
    }
}
