<?php

namespace App\Models\Yojana\AdharBhooti\BudgetShrotBawasayathapan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BudgetShrot extends Model
{
    use HasFactory;
    protected $fillable=[
        "code",
        "top_source",
        "full_name",
        "name",
        "phone_number",
        "email",
        "country",
        "address",
        "details",
        "situation",
        "user_id",
        "is_deleted",
    ];
}
