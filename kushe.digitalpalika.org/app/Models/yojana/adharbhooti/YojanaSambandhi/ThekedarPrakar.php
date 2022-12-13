<?php

namespace App\Models\Yojana\AdharBhooti\YojanaSambandhi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThekedarPrakar extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'full_name',
        'name',
        'continuous',
        'details',
        'situation',
        'user_id',
        'is_deleted',
    ];
}
