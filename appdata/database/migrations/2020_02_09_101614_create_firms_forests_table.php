<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFirmsForestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('firms_forests', function (Blueprint $table) {
           $table->string('type');
           $table->string('region');
           $table->string('municipalities');
           $table->string('area');
           $table->string('room_nr');
           $table->string('price');
           $table->string('keyword');
           $table->string('no_of_floor');
           $table->string('house_no');
           $table->string('plot_area');
           $table->string('built_year');
           $table->string('year');
           $table->string('building_type');
           $table->string('house_type');
           $table->string('equipment');
           $table->string('closest_body');
           $table->string('distance_body ');
           $table->string('BuildingEnergyClass');
           $table->string('feq_heating_system');
           $table->string('feq_water_system');
           $table->string('feq_description');
           $table->string('feq_additional_premises');
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
        Schema::dropIfExists('firms_forests');
    }
}
