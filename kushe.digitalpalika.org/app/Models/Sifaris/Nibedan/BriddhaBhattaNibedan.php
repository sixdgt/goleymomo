<?php

namespace App\Models\sifaris\Nibedan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BriddhaBhattaNibedan extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'designation',
        'from_palika',
        'to_palika',
        'applied_at',
        'category',
        'name',
        'father_name',
        'mother_name',
        'date_of_birth',
        'address',
        'gender',
        'citizenship_number',
        'issued_district',
        'date_of_old_age_citizen',
        'contact_number',
        'widow_spouse_name',
        'window_spouse_death_date',
        'signature',
        'registered_date',
        'type',
        'card_number',
        'bhatta_started_date',
        'month_type',
        'applicant_name_bibaran',
        'applicant_address_bibaran',
        'applicant_citizenship_number',
        'applicant_phone_number'
    ];
}
