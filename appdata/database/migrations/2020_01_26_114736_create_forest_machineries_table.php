<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForestMachineriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forest_machineries', function (Blueprint $table) {
            $table->string('forest_mach_type');
            $table->string('new_used');
            $table->string('manufature_year');
            $table->string('manufature_month');
            $table->string('power');
            $table->string('power_unit');
            $table->string('make');
            $table->string('model');
            $table->string('work_hour');
            $table->string('layout');
            $table->string('price');
            $table->string('export_price');
            $table->string('wheel_width');
            $table->string('range');
            $table->string('lifting_moment');
            $table->string('feq_additional_equipment');
            $table->string('feq_electronics');
            $table->string('feq_safety');
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
        Schema::dropIfExists('forest_machineries');
    }
}
