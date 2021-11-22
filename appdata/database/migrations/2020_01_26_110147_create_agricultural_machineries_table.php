<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgriculturalMachineriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agricultural_machineries', function (Blueprint $table) {
         $table->string('agri_mach_type');
         $table->string('new_used');
         $table->string('manufature_year');
         $table->string('manufature_month');
         $table->string('ope_width');
         $table->string('make');
         $table->string('model');
         $table->string('work_hour');
         $table->string('power');
         $table->string('power_unit');
         $table->string('price');
         $table->string('export_price');
         $table->string('feq_additional_equipment');
         $table->string('feq_electronics');
         $table->string('feq_interior');
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
        Schema::dropIfExists('agricultural_machineries');
    }
}
