<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKayaksCanoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kayaks_canoes', function (Blueprint $table) {
            $table->string('kay_can');
            $table->string('kay_can_type');
            $table->string('manufacturer');
            $table->string('model');
            $table->string('price');
            $table->string('export_price');
            $table->string('seat_num');
            $table->string('new_used');
            $table->string('damage');
            $table->string('hull_mat');
            $table->string('manufature_year');
            $table->string('manufature_month');
            $table->string('overall_length');
            $table->string('overall_width');
            $table->string('inner_length');
            $table->string('inner_width');
            $table->string('height');
            $table->string('weight');
            $table->string('weight_capacity');
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
        Schema::dropIfExists('kayaks_canoes');
    }
}
