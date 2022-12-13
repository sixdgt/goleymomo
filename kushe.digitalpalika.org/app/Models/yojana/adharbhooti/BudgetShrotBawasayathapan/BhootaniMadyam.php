<?php

namespace App\Models\Yojana\AdharBhooti\BudgetShrotBawasayathapan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BhootaniMadyam extends Model
{
    use HasFactory;
    protected $fillable=[
        "code",
        "full_name",
        "name",
        "account_title",
        "details",
        "situation",
        "user_id",
        "is_deleted",
    ];
}
