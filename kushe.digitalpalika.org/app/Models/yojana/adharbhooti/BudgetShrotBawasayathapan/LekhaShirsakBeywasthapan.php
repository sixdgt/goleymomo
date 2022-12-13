<?php

namespace App\Models\Yojana\AdharBhooti\BudgetShrotBawasayathapan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LekhaShirsakBeywasthapan extends Model
{
    use HasFactory;
    protected $fillable=[
        "code",
        "full_name",
        "name",
        "module",
        "alternate_code",
        "show_name",
        "sub_module",
        "display_name",
        "top_account",
        "fiscal_year",
        "budget",
        "sapati",
        "transfer_account",
        "fund_account",
        "current_capital",
        "current_ratio",
        "capital_ratio",
        "situation",
        "details",
        "user_id",
        "is_deleted",
    ];
}
