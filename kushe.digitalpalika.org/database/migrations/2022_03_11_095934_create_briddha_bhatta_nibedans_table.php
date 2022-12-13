<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBriddhaBhattaNibedansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('briddha_bhatta_nibedans', function (Blueprint $table) {
            $table->id();
            $table->string('designation');
            $table->string('from_palika');
            $table->string('to_palika');
            $table->date('application_date');
            $table->string('category');
            $table->string('name');
            $table->string('father_name');
            $table->string('mother_name');
            $table->date('date_of_birth');
            $table->string('address');
            $table->string('gender');
            $table->string('citizenship_number');
            $table->string('issued_district');
            $table->date('date_of_old_age_citizen');
            $table->string('contact_number');
            $table->string('widow_spouse_name');
            $table->date('window_spouse_death_date');
            $table->string('signature');
            $table->date('registered_date');
            $table->string('type');
            $table->integer('card_number');
            $table->string('bhatta_started_date');
            $table->string('month_type');
            $table->string('applicant_name');
            $table->string('applicant_address');
            $table->string('applicant_citizenship_no');
            $table->string('applicant_contact');
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
        Schema::dropIfExists('briddha_bhatta_nibedans');
    }
}
