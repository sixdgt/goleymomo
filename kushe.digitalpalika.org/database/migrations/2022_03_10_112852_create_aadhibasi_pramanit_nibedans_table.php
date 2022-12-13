<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAadhibasiPramanitNibedansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aadhibasi_pramanit_nibedans', function (Blueprint $table) {
            $table->id();
            $table->string('palika_name');
            $table->string('palika_address');
            $table->string('janajati_category');
            $table->string('palika_name_app_body');
            $table->integer('palika_ward_no');
            $table->string('applicant_parent_abbreviation');
            $table->string('applicant_parent_name');
            $table->string('applicant_relationship');
            $table->string('applicant_abbreviation');
            $table->string('applicant_name');
            $table->string('is_janajati');
            $table->string('janajati_caste');
            $table->string('documents');
            $table->string('document_description');
            $table->string('applied_at');
            $table->string('applicant_address');
            $table->string('applicant_name_bibaran');
            $table->string('applicant_address_bibaran');
            $table->string('applicant_citizenship_number');
            $table->string('applicant_phone_number');
            $table->bigInteger('submitted_by');
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
        Schema::dropIfExists('aadhibasi_pramanit_nibedans');
    }
}
