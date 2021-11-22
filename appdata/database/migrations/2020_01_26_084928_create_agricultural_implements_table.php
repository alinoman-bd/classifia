<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgriculturalImplementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agricultural_implements', function (Blueprint $table) {
            $table->string('agri_imp_type');
            $table->string('new_used');
            $table->string('manufature_year');
            $table->string('manufature_month');
            $table->string('ope_width');
            $table->string('make');
            $table->string('model');
            $table->string('frames');
            $table->string('price');
            $table->string('export_price');
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
        Schema::dropIfExists('agricultural_implements');
    }
}
