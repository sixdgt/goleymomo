<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DpPratinidhi extends Model
{
    use HasFactory;

    public function files()
    {
        return $this->morphMany(File::class,'fileable');
    }
}
