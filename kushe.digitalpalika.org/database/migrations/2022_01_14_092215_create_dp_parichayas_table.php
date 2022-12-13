<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDpParichayasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dp_parichayas', function (Blueprint $table) {
            $table->id();
            $table->string('dp_gn_name');
            $table->string('dp_gn_history');
            $table->string('dp_gn_long');
            $table->string('dp_gn_lat');
            $table->string('dp_gn_demographics');
            $table->string('dp_gn_religion');
            $table->string('dp_gn_culture');
            $table->string('dp_gn_architecture');
            $table->string('dp_gn_city_scape');
            $table->string('dp_gn_tourism_area');
            $table->string('dp_gn_population');
            $table->string('dp_gn_education');
            $table->string('dp_gn_healthcare');
            $table->string('dp_gn_transport');
            $table->string('dp_gn_boundary');
            $table->string('dp_user_id');
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
        Schema::dropIfExists('dp_parichayas');
    }
}