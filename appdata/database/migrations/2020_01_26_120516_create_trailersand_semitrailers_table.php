<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrailersandSemitrailersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trailersand_semitrailers', function (Blueprint $table) {
          $table->string('trailer');
           $table->string('trailer_type');
           $table->string('gross_weight');
           $table->string('curb_weight');
           $table->string('manufature_year');
           $table->string('manufature_month');
           $table->string('make');
           $table->string('model');
           $table->string('suspension');
           $table->string('price');
           $table->string('vat');
           $table->string('length');
           $table->string('width');
           $table->string('alx_make');
           $table->string('semi_axl_num');
           $table->string('height');
           $table->string('volume');
           $table->string('damage');
           $table->string('new_used');
           $table->string('color');
           $table->string('mot_exp_date');
           $table->string('mot_exp_mnth');
           $table->string('vin_num');
           $table->string('feq_trim_level');
           $table->string('feq_additional_equipment');
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
        Schema::dropIfExists('trailersand_semitrailers');
    }
}
