<?php

namespace App\Models\Yojana\AdharBhooti\YojanaSambandhi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KharchakoFaatWariBhiwaran extends Model
{
    use HasFactory;
    protected $fillable=[
        "code",
        "name",
        "full_name",
        "details",
        "situation",
        "is_addition",
        "is_deleted",
        "user_id",
    ];
}
