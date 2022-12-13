<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBaalBaalikaParichayapatrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baal_baalika_parichayapatras', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');

            $table->string('father_first_name');
            $table->string('father_middle_name')->nullable();
            $table->string('father_last_name');

            $table->string('mother_first_name');
            $table->string('mother_middle_name')->nullable();
            $table->string('mother_last_name');


            $table->string('grand_father_first_name');
            $table->string('grand_father_middle_name')->nullable();
            $table->string('grand_father_last_name');

            $table->string('dob');
            $table->string('gender');
            $table->string('baalbaalika_profile_picture');
            $table->string('baalbaalika_birth_certificate')->nullable();
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
        Schema::dropIfExists('baal_baalika_parichayapatras');
    }
}
