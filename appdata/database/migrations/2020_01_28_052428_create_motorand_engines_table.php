<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMotorandEnginesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('motorand_engines', function (Blueprint $table) {
            $table->string('eng_type');
            $table->string('price');
            $table->string('export_price');
            $table->string('eng_make');
            $table->string('eng_model');
            $table->string('eng_capacity');
            $table->string('power');
            $table->string('power_unit');
            $table->string('fuel_type');
            $table->string('new_used');
            $table->string('cylinder_num');
            $table->string('revolution');
            $table->string('start_system');
            $table->string('leg_size');
            $table->string('manufature_year');
            $table->string('manufature_month');
            $table->string('fuel_tank_capacity');
            $table->string('weight');
            $table->string('feq');
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
        Schema::dropIfExists('motorand_engines');
    }
}
