<?php

namespace App\Models\Sewa\Yojana;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DpChalaniModel extends Model
{
    use HasFactory;

    protected $table = "dp_chalanis";

    protected $fillable = [
        'dp_chalani_number',
        'dp_chalani_date',
        'dp_chalani_letter_type',
        'dp_chalani_letter_department',
        'dp_chalani_letter_to',
        'dp_chalani_letter_address',
        'dp_chalani_subject',
        'dp_chalani_file',
        'dp_chalani_bodartha',
        'dp_chalani_kaifiyat',
    ];
}
