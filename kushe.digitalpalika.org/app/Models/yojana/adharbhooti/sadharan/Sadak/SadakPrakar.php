<?php

namespace App\Models\Yojana\AdharBhooti\Sadharan\Sadak;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SadakPrakar extends Model
{
    use HasFactory;
    protected $fillable = [
        "code",
        "full_name",
        "name",
        "details",
        "consecutive",
        "situation",
        "user_id",
        "is_deleted",
    ];
}
