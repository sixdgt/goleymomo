<?php

namespace App\Models\Sewa\ParichayaPatra;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApaangaParichayapatra extends Model
{
    use HasFactory;

    protected $table = "apaanga_parichayapatras";

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
        'marital_status',
        'contact',
        'picture',
        'citizenship',
    ];
}
