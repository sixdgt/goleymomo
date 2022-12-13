<?php

namespace App\Models\Yojana\AdharBhooti\Sadharan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MudhaNam extends Model
{
    use HasFactory;
    protected $fillable = [
        "code",
        "full_name",
        "name",
        "symbol",
        "details",
        "situation",
        "user_id",
        "is_deleted"
    ];
}
