<?php

namespace App\Models\Yojana\AdharBhooti\YojanaSambandhi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YojanaKissim extends Model
{
    use HasFactory;
    protected $fillable = [
        "code",
        "full_name",
        "name",
        "upper_group",
        "details",
        "user_id",
        "is_deleted",
    ];
}
