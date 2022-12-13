<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDpChalaniModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dp_chalanis', function (Blueprint $table) {
            $table->id();
            $table->string('dp_chalani_number');
            $table->string('dp_chalani_date');
            $table->string('dp_chalani_letter_type');
            $table->string('dp_chalani_letter_department');
            $table->string('dp_chalani_letter_to');
            $table->string('dp_chalani_letter_address');
            $table->string('dp_chalani_subject');
            $table->string('dp_chalani_file')->nullable();
            $table->string('dp_chalani_bodartha')->nullable();
            $table->string('dp_chalani_kaifiyat')->nullable();
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
        Schema::dropIfExists('dp_chalanis');
    }
}
