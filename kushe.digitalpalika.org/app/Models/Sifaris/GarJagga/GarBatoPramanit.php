<?php

namespace App\Models\Sifaris\GarJagga;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GarBatoPramanit extends Model
{
    use HasFactory;
    
    protected $fillable=[
        "applied_date",
      "patra_no",
      "chalani_no",
      "office_name",
      "office_address",
      "office_district_name",
      "body_district_name",
      "body_palika_name",
      "body_ward_no",
      "body_sabik_palika_name",
      "body_sabik_ward_no",
      "body_person_abbreviation",
      "body_person_name",
      "sifaris_body_applicant_sign",
      "submitted_person_name",
      "submitted_person_post",
      "applicant_name_bibaran",
      "applicant_address_bibaran",
      "applicant_citizenship_number",
      "applicant_phone_number",
        "submitted_by",
        'deleted'=>0
    ];
}
