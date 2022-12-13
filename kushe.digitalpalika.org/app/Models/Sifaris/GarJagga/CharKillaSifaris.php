<?php

namespace App\Models\Sifaris\GarJagga;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CharKillaSifaris extends Model
{
    use HasFactory;
    
    protected $fillable=[
        "applied_date",
        "patra_no",
        "chalani_no",
        "office_name",
        "office_address",
        "office_district_name",
        "body_sabik_palika_name",
        "body_sabik_ward_no",
        "body_current_pradesh_no",
        "body_current_district_name",
        "body_current_palika_name",
        "body_current_palika_type",
        "body_current_ward_no",
        "body_grand_father_name",
        "body_grand_child_type",
        "body_father_name",
        "body_child_type",
        "body_person_abbreviation",
        "body_person_name",
        "body_char_killa_pramanit_reason",
        "body_bato_no_in_jagga",
        "body_gar_no_in_jagga",
        
        "note",
        "submitted_person_sign",
        "submitted_person_name",
        "submitted_person_post",
        "applicant_name_bibaran",
        "applicant_address_bibaran",
        "applicant_citizenship_number",
        "applicant_phone_number",
        
        "deleted"=>0,
        "submitted_by"
    ];
}
