<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKarmacharisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karmacharis', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('dp_wada_id');
            $table->bigInteger('dp_karmachari_type_id');
            $table->string('dp_karmachari_first_name',255);
            $table->string('dp_karmachari_middle_name',255);
            $table->string('dp_karmachari_last_name',255);
            $table->string('dp_karmachari_designation');
            $table->string('dp_karmachari_phone_number');
            $table->string('dp_karmachari_profile_pic');
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
        Schema::dropIfExists('karmacharis');
    }
}
