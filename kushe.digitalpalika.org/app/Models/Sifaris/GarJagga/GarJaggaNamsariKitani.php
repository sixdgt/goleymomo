<?php

namespace App\Models\Sifaris\GarJagga;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class GarJaggaNamsariKitani extends Model
{
    public $id='1';
    use HasFactory;
    protected $fillable=[
        'patra_no', 'applied_date', 'chalani_no', 'office_name', 'office_address', 'office_district_name', 'body_district_name', 'body_palika_name', 'body_ward_no', 'body_sabik_palika_name', 'body_sabik_ward_no', 'body_grand_father_name', 'body_grand_child_type', 'body_father_name', 'body_mother_name', 'body_child_type', 'body_person_abbreviation', 'body_person_name', 'body_relation_name', 'body_death_person_abbreviation', 'body_death_person_name', 'body_death_date', 'body_jagga_palika', 'body_jagga_ward_no', 'body_jagga_sabik_palika', 'body_jagga_sabik_ward_no', 'body_kitta_no', 'body_jabi', 'body_namsari_property_type', 'body_hakdar_type', 'table_death_person_name', 'table_relation_with_death_person', 'table_death_date', 'nibedak_palika_name', 'nibedak_ward_no', 'nibedak_age', 'nibedak_name', 'nibedak_total_no', 'extra_note','submitted_person_name', 'submitted_person_post', 'applicant_name_bibaran', 'applicant_address_bibaran', 'applicant_citizenship_number', 'applicant_phone_number', 'deleted'=>0,
        'submitted_by',
    ];

}
