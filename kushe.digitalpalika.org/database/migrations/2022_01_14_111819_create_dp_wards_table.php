<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDpWardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dp_wards', function (Blueprint $table) {
            $table->id();
            $table->string('dp_ward_name');
            $table->string('dp_ward_description');
            $table->string('dp_ward_address');
            $table->string('dp_ward_contact');
            $table->string('dp_ward_bg_image');
            $table->string('dp_gn_id');
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
        Schema::dropIfExists('dp_wards');
    }
}
