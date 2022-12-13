<?php

namespace App\Models\Yojana\AdharBhooti\Sadharan\SuchikritBhiwaran;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuchikritBhiwaran extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'type',
        'suchikrit_prakar',
        'institution',
        'situation',
        'user_id',
        'is_deleted',
    ];

    public function suchikritiPrakar()
    {
        return $this->belongsTo(SuchikritPrakar::class);
    }

}
