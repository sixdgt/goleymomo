<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDpDartaModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dp_dartas', function (Blueprint $table) {
            $table->id();
            $table->string('dp_chalani_number');
            $table->string('dp_darta_number');
            $table->string('dp_darta_date');
            $table->string('dp_darta_letter_from');
            $table->string('dp_darta_letter_department');
            $table->string('dp_darta_letter_to');
            $table->string('dp_darta_subject');
            $table->string('dp_darta_file')->nullable();
            $table->string('dp_darta_description')->nullable();
            $table->string('dp_darta_kaifiyat')->nullable();
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
        Schema::dropIfExists('dp_dartas');
    }
}
