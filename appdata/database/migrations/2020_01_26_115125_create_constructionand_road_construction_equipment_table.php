<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConstructionandRoadConstructionEquipmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('constructionand_road_construction_equipment', function (Blueprint $table) {
            $table->string('road_const_type');
            $table->string('new_used');
            $table->string('work_hour');
            $table->string('volume');
            $table->string('make');
            $table->string('model');
            $table->string('power');
            $table->string('power_unit');
            $table->string('trans_type');
            $table->string('price');
            $table->string('vat');
            $table->string('kerb_weight');
            $table->string('gross_weight');
            $table->string('export_price');
            $table->string('lifting_height');
            $table->string('boom_length');
            $table->string('manufature_year');
            $table->string('manufature_month');
            $table->string('damage');
            $table->string('lifting_capacity');
            $table->string('digging_depth');
            $table->string('layout');
            $table->string('euro_std');
            $table->string('str_wheel');
            $table->string('vin_num');
            $table->string('color');
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
        Schema::dropIfExists('constructionand_road_construction_equipment');
    }
}
