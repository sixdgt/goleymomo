<?php

namespace App\Models\Yojana\AdharBhooti\Sadharan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SahayakModule extends Model
{
    use HasFactory;
    protected $fillable = [
        "code",
        "full_name",
        "name",
        "module",
        "efficiency",
        "situation",
        "user_id",
        "is_deleted",
    ];
}
