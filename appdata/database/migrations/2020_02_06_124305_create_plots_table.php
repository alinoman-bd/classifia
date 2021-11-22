<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plots', function (Blueprint $table) {
         $table->string('type');
         $table->string('region');
         $table->string('municipalities');
         $table->string('area');
         $table->string('room_nr');
         $table->string('price');
         $table->string('keyword');
         $table->string('lot_no');
         $table->string('feq_description');
         $table->string('feq_purpose');
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
        Schema::dropIfExists('plots');
    }
}
