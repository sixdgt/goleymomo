<?php

namespace App\Models\Yojana\AdharBhooti\BudgetShrotBawasayathapan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SahayakLedger extends Model
{
    use HasFactory;
    protected $fillable=[
        "code",
        "full_name",
        "name",
        "details",
        "continuous",
        "situation",
        "is_deleted",
        "user_id",
    ];
}
