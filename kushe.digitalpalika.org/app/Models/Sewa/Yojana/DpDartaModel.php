<?php

namespace App\Models\Sewa\Yojana;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DpDartaModel extends Model
{
    use HasFactory;

    protected $table = "dp_dartas";

    protected $fillable = [
        'dp_chalani_number',
        'dp_darta_number',
        'dp_darta_date',
        'dp_darta_letter_from',
        'dp_darta_letter_department',
        'dp_darta_letter_to',
        'dp_darta_subject',
        'dp_darta_file',
        'dp_darta_description',
        'dp_darta_kaifiyat',
    ];
}
