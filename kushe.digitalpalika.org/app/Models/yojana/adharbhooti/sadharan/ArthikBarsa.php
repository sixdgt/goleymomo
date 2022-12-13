<?php

namespace App\Models\Yojana\AdharBhooti\Sadharan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArthikBarsa extends Model
{
    use HasFactory;
    protected $fillable = [
        "code",
        "date_from_bs",
        "date_to_bs",
        "date_from_ad",
        "date_to_ad",
        "consecutive",
        "situation",
        "user_id",
        "is_deleted",
    ];
}
