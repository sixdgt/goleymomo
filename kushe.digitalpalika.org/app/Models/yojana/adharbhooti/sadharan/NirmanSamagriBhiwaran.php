<?php

namespace App\Models\Yojana\AdharBhooti\Sadharan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NirmanSamagriBhiwaran extends Model
{
    use HasFactory;
    protected $fillable=[
        "code",
        "full_name",
        "name",
        "details",
        "situation",
        "user_id",
        "is_deleted",
    ];
}
