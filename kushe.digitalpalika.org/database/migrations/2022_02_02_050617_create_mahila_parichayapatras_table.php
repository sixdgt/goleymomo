<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMahilaParichayapatrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahila_parichayapatras', function (Blueprint $table) {
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

            $table->string('husband_first_name')->nullable();
            $table->string('husband_middle_name')->nullable();
            $table->string('husband_last_name')->nullable();

            $table->string('dob');
            $table->string('marital_status');
            $table->string('contact');
            $table->string('mahila_profile_picture');
            $table->string('mahila_citizenship')->nullable();
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
        Schema::dropIfExists('mahila_parichayapatras');
    }
}
