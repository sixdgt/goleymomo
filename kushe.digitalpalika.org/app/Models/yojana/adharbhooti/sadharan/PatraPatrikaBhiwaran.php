<?php

namespace App\Models\Yojana\AdharBhooti\Sadharan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatraPatrikaBhiwaran extends Model
{
    use HasFactory;
    protected $fillable=[
        "code",
        "magazine_name",
        "magazine_address",
        "printing_house",
        "contact_person",
        "contact_number",
        "is_deleted",
        "user_id",
    ];
}
