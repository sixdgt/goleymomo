<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sadasya extends Model
{
    use HasFactory;

    public function getSadasyas()
    {
        return $this->hasOne(User::class);
    }
}
