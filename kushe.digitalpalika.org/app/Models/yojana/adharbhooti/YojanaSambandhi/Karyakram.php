<?php

namespace App\Models\Yojana\AdharBhooti\YojanaSambandhi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyakram extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'full_name',
        'name',
        'details',
        'upper_workspace',
        'situation',
        'user_id',
        'is_deleted',
    ];
}
