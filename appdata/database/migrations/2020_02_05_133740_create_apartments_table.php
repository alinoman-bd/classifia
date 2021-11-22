<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartments', function (Blueprint $table) {
            $table->string('type');
            $table->string('region');
            $table->string('municipalities');
            $table->string('house_no');
            $table->string('flat_no');
            $table->string('area');
            $table->string('room_nr');
            $table->string('floor');
            $table->string('price');
            $table->string('keyword');
            $table->string('no_of_floor');
            $table->string('built_year');
            $table->string('house_type');
            $table->string('equipment');
            $table->string('BuildingEnergyClass');
            $table->string('exchanging');
            $table->string('auction');
            $table->string('heating_system');
            $table->string('feq_description');
            $table->string('additional_premises');
            $table->string('additional_equipment');
            $table->string('security');
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
        Schema::dropIfExists('apartments');
    }
}
