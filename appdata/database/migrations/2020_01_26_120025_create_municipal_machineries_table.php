<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMunicipalMachineriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('municipal_machineries', function (Blueprint $table) {
            $table->string('muni_mach_type');
            $table->string('manufature_year');
            $table->string('manufature_month');
            $table->string('power');
            $table->string('power_unit');
            $table->string('work_hour');
            $table->string('make');
            $table->string('model');
            $table->string('kerb_weight');
            $table->string('gross_weight');
            $table->string('price');
            $table->string('vat');
            $table->string('export_price');
            $table->string('layout');
            $table->string('damage');
            $table->string('new_used');
            $table->string('fuel_type');
            $table->string('gear_box');
            $table->string('volume');
            $table->string('lifting_capacity');
            $table->string('euro_stndard');
            $table->string('color');
            $table->string('str_wheel');
            $table->string('vin_num');
            $table->string('feq_electronics');
            $table->string('feq_kabina');
            $table->string('feq_additional_equipment');
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
        Schema::dropIfExists('municipal_machineries');
    }
}
