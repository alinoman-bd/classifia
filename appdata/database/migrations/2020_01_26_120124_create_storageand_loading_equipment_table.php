<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStorageandLoadingEquipmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('storageand_loading_equipment', function (Blueprint $table) {
           $table->string('storage_type');
           $table->string('make');
           $table->string('model');
           $table->string('manufature_year');
           $table->string('manufature_month');
           $table->string('price');
           $table->string('vat');
           $table->string('export_price');
           $table->string('power');
           $table->string('power_unit');
           $table->string('damage');
           $table->string('new_used');
           $table->string('boom_type');
           $table->string('lifting_height');
           $table->string('fuel_type');
           $table->string('trans_type');
           $table->string('struc_height');
           $table->string('fr_lift_height');
           $table->string('kerb_weight');
           $table->string('work_hour');
           $table->string('fork_length');
           $table->string('lifting_capacity');
           $table->string('length');
           $table->string('height');
           $table->string('width');
           $table->string('color');
           $table->string('vin_num');
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
        Schema::dropIfExists('storageand_loading_equipment');
    }
}
