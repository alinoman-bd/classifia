<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVillasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('villas', function (Blueprint $table) {
           $table->string('type');
           $table->string('region');
           $table->string('municipalities');
           $table->string('area');
           $table->string('room_nr');
           $table->string('price');
           $table->string('keyword');
           $table->string('house_no');
           $table->string('floor');
           $table->string('no_of_floor');
           $table->string('plot_area');
           $table->string('premises_nr');
           $table->string('premises_sum');
           $table->string('built_year');
           $table->string('year');
           $table->string('equipment');
           $table->string('BuildingEnergyClass');
           $table->string('feq_purpose');
           $table->string('feq_water_system');
           $table->string('feq_heating_system');
           $table->string('feq_description');
           $table->string('feq_additional_equipment');
           $table->string('feq_security');
           $table->string('description');
           $table->string('youtube');
           $table->string('3dTour');
           $table->string('image');
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
        Schema::dropIfExists('villas');
    }
}
