<?php

namespace App\Models\Yojana\AdharBhooti\Sadharan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kharyalaya extends Model
{
    use HasFactory;
    protected $fillable = [
        "type",
        "code",
        "situation",
        "full_name",
        "name",
        "registration_no",
        "date_in_bs",
        "date_in_ad",
        "karyalaya",
        "other_details",
        "savik_zone",
        "savik_district",
        "savik_palika",
        "savik_ward_no",
        "savik_house_no",
        "savik_toll_no",
        "halko_provinces",
        "halko_district",
        "halko_palika",
        "halko_ward_no",
        "halko_street_name",
        "phone_number",
        "mobile_number",
        "fax",
        "email",
        "correspondence_address",
        "contact_person_full_name",
        "contact_person_name",
        "contact_person_post",
        "contact_person_phone_number",
        "contact_person_mobile_number",
        "contact_person_email",
        "apology",
        "continuous",
        "user_id",
        "is_deleted",
    ];
}
