<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHouseAdPosterInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('house_ad_poster_infos', function (Blueprint $table) {
            $table->string('ad_cat');
            $table->string('ad_type');
            $table->string('ad_id');
            $table->string('user_id');
            $table->string('contact_mail');
            $table->string('contact_phone');
            $table->string('contact_country');
            $table->string('contact_city');
            $table->string('additional_number');
            $table->string('user_name');
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
        Schema::dropIfExists('house_ad_poster_infos');
    }
}
