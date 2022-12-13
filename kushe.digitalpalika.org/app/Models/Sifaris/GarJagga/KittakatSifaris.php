<?php

namespace App\Models\Sifaris\GarJagga;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KittakatSifaris extends Model
{
    use HasFactory;
    protected $fillable=[
        "applied_date",
      "patra_no",
      "chalani_no",
      "receiver_office_type",
      "prasasan_address",
      "prasasan_district",
      "body_district_name",
      "body_palika_name",
      "body_palika_type",
      "body_ward_no",
      "body_sabik_palika_name",
      "body_sabik_ward_no",
      "body_person_abbreviation",
      "body_person_name",
      "total_jagga_area",
      "kittakat_jagga_area",
      "kittakat_type",
      "gar_jagga_area",
      "gar_area",
      "gar_bhuitala_area",
      "paune_far",
      "sifaris_reason",
      "prabidhik_name",
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
