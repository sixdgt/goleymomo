<?php

namespace App\Models\Yojana\AdharBhooti\Sadharan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BisayagatKaryaChetra extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'upper_workspace',
        'full_name',
        'name',
        'details',
        'situation',
        'user_id',
        'is_deleted',
    ];
}
