<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeisureHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leisure_hotels', function (Blueprint $table) {
           $table->string('type');
           $table->string('region');
           $table->string('municipalities');
           $table->string('area');
           $table->string('room_nr');
           $table->string('price');
           $table->string('keyword');
           $table->string('leisure_hotel_type');
           $table->string('feq_description');
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
        Schema::dropIfExists('leisure_hotels');
    }
}
