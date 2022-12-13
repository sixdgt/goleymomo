<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateByabasayaDarkhastaNibedansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('byabasaya_darkhasta_nibedans', function (Blueprint $table) {
            $table->id();

            $table->string('applied_at');
            $table->string('designation');
            $table->string('name_of_authority');
            $table->string('authority_office');
            $table->string('authority_office_address');
            $table->string('business_name_nepali');
            $table->string('business_name_english');
            $table->string('business_district');
            $table->string('business_ward_no');
            $table->string('business_tol');
            $table->string('business_phone_num');

            $table->string('business_deposit_amount');
            $table->string('business_deposit_word');
            $table->string('business_purpose');
            $table->string('business_model');
            $table->string('proprieter_name');
            $table->string('proprieter_district');
            $table->string('proprieter_street');
            $table->string('proprieter_ward_no');
            $table->string('proprieter_phone');
            $table->string('proprieter_tol');
            $table->string('proprieter_citizenship_num');
            $table->string('proprieter_citizenship_district');

            $table->string('proprieter_citizenship_issue_date');
            $table->string('proprieter_current_district');
            $table->string('proprieter_current_street');
            $table->string('proprieter_current_ward_no');
            $table->string('proprieter_current_tol');
            $table->string('proprieter_grand_father_name');
            $table->string('proprieter_grand_father_address');
            $table->string('proprieter_father_name');
            $table->string('proprieter_father_address');
            $table->string('proprieter_wife_name');
            $table->string('proprieter_wife_address');

            $table->string('kabuliyatnama_applicant_name');
            $table->string('kabuliyatnama_applicant_signature');
            $table->string('kabuliyatnama_grand_father_name');
            $table->string('kabuliyatnama_father_name');
            $table->string('kabuliyatnama_applicant_address');
            $table->string('kabuliyatnama_applicant_age');
            $table->string('kabuliyatnama_proprieter_name_application');
            $table->string('kabuliyatnama_applicant_business_name');
            $table->string('kabuliyatnama_applied_office');
            $table->string('kabuliyatnama_applied_office_ward_no');

            $table->string('kabuliyatnama_year');
            $table->string('kabuliyatnama_month');
            $table->string('kabuliyatnama_date');
            $table->string('sanakhat_name');
            $table->string('sanakhat_ward_no');
            $table->string('sanakhat_proprieter_name');
            $table->string('sanakhat_date');
            $table->string('tippani_business_name');
            $table->string('tippani_proprieter_name');
            $table->string('tippani_manasib_amount');

            $table->string('tippani_rajaswa_amount');
            $table->string('tippani_applied_by');
            $table->string('tippani_processed_by');
            $table->string('applicant_name');
            $table->string('applicant_address');
            $table->string('applicant_citizenship_num');
            $table->string('applicant_phone_no');

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
        Schema::dropIfExists('byabasaya_darkhasta_nibedans');
    }
}
