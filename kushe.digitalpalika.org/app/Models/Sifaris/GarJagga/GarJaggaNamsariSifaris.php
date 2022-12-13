<?php

namespace App\Models\Sifaris\GarJagga;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GarJaggaNamsariSifaris extends Model
{
    use HasFactory;
    
    protected $fillable=
        [
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
              "body_nibedak_abbreviation",
              "body_nibedak_name",
              "body_nibedak_relationship_with_death_person",
              "body_death_person_name",
              "body_death_date",
              "body_nibedak_abbreviation_second",
              "body_nibedak_name_second",
              "body_namsari_property_type",
              "sifaris_body_applicant_sign",
              "submitted_person_name",
              "submitted_person_post",
              "applicant_name_bibaran",
              "applicant_address_bibaran",
              "applicant_citizenship_number",
              "applicant_phone_number",
                "submitted_by",
                "deleted"=>0
        ];
}
