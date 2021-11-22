<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoatsRaftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boats_rafts', function (Blueprint $table) {
            $table->string('boat_raft_type');
            $table->string('seat_num');
            $table->string('manufacturer');
            $table->string('model');
            $table->string('price');
            $table->string('export_price');
            $table->string('new_used');
            $table->string('damage');
            $table->string('overall_length');
            $table->string('overall_width');
            $table->string('inner_length');
            $table->string('inner_width');
            $table->string('height');
            $table->string('weight');
            $table->string('weight_capacity');
            $table->string('manufature_year');
            $table->string('manufature_month');
            $table->string('power');
            $table->string('power_unit');
            $table->string('fuel_type');
            $table->string('color');
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
        Schema::dropIfExists('boats_rafts');
    }
}
