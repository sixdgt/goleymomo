<?php

namespace App\Models\Yojana\AdharBhooti\Sadharan\SuchikritBhiwaran;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuchikritPrakar extends Model
{
    use HasFactory;
    protected $fillable = [
        "code",
        "upper_group",
        "full_name",
        "name",
        "registration_no",
        "details",
        "situation",
        "user_id",
        "is_deleted",
    ];
}
