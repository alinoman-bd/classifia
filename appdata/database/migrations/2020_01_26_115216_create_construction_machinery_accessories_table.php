<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConstructionMachineryAccessoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('construction_machinery_accessories', function (Blueprint $table) {
           $table->string('const_mach_type');
            $table->string('new_used');
            $table->string('make');
            $table->string('model');
            $table->string('price');
            $table->string('vat');
            $table->string('manufature_year');
            $table->string('manufature_month');
            $table->string('volume');
            $table->string('weight');
            $table->string('length');
            $table->string('width');
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
        Schema::dropIfExists('construction_machinery_accessories');
    }
}
