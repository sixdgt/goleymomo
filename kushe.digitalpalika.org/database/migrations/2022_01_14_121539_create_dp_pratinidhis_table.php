<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDpPratinidhisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dp_pratinidhis', function (Blueprint $table) {
            $table->id();
            $table->string('dp_pratinidhi_first_name');
            $table->string('dp_pratinidhi_middle_name')->nullable();
            $table->string('dp_pratinidhi_last_name');
            $table->string('dp_pratinidhi_designation');
            $table->string('dp_pratinidhi_gender');
            $table->string('dp_pratinidhi_dob');
            $table->string('dp_pratinidhi_contact');
            $table->string('dp_pratinidhi_profile_pic');
            $table->string('dp_pratinidhi_parichayapatra_file');
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
        Schema::dropIfExists('dp_pratinidhis');
    }
}
