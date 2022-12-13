<?php

namespace App\Models\Sewa\ParichayaPatra;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaalBaalikaParichayapatra extends Model
{
    use HasFactory;

    protected $table = "baal_baalika_parichayapatras";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'dob',
        'gender',
        'picture',
        'birth_certificate',
    ];
}
