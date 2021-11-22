<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSailboatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sailboats', function (Blueprint $table) {
            $table->string('manufacturer');
            $table->string('model');
            $table->string('manufature_year');
            $table->string('manufature_month');
            $table->string('sailboat_type');
            $table->string('price');
            $table->string('export_price');
            $table->string('new_used');
            $table->string('damage');
            $table->string('overall_length');
            $table->string('length_unit');
            $table->string('draft');
            $table->string('beam');
            $table->string('beam_unit');
            $table->string('hull_mat');
            $table->string('color');
            $table->string('rig_type');
            $table->string('sail_area');
            $table->string('cabin_num');
            $table->string('berth_num');
            $table->string('str_wheel');
            $table->string('fresh_water_capacity');
            $table->string('hold_tank_capacity');
            $table->string('fuel_tank_capacity');
            $table->string('fuel_type');
            $table->string('eng_type');
            $table->string('eng_num');
            $table->string('eng_capacity');
            $table->string('power');
            $table->string('power_unit');
            $table->string('eng_make');
            $table->string('eng_model');
            $table->string('light_displacement');
            $table->string('weight');
            $table->string('shower_num');
            $table->string('tiolet_num');
            $table->string('batterie_type');
            $table->string('batterie_capacity');
            $table->string('country');
            $table->string('feq_additional_equipment');
            $table->string('feq_audio_video_equipment');
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
        Schema::dropIfExists('sailboats');
    }
}
