<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConstrctonNRoadconstrtonFeatureEqpmentValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('constrcton_n_roadconstrton_feature_eqpment_values', function (Blueprint $table) {
            $table->string('title_id');
            $table->string('value');
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
        Schema::dropIfExists('constrcton_n_roadconstrton_feature_eqpment_values');
    }
}
