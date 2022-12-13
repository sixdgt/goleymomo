<?php

namespace App\Models\Sifaris\GarJagga;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GarKayamSifaris extends Model
{
    use HasFactory;


    protected $fillable=[
        'patra_no',
        'applied_date',
        'chalani_no',
        'office_name',
        'office_address',
        'office_district_name',
        'body_district_name',
        'body_palika_name',
        'body_ward_no',
        'body_sabik_palika_name',
        'body_sabik_ward_no',
        'body_person_abbreviation',
        'body_person_name',
        'body_gar_nirman_type',

        'table_sabic_local_office_type',
        'table_sabic_local_ward_no',
        'table_current_palika_type',
        'table_current_palika_ward_no',

        'submitted_person_name',
        'submitted_person_post',

        'applicant_name_bibaran',
        'applicant_address_bibaran',
        'applicant_citizenship_number',
        'applicant_phone_number',

        'deleted'=>0,
        'submitted_by',
    ];
}
