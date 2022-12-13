<?php

namespace App\Models\Sifaris\Nibedan;

use App\Models\File;
use function GuzzleHttp\Promise\rejection_for;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AadhibasiPramanitNibedan extends Model
{
    use HasFactory;

    public function files()
    {
        return $this->morphMany(File::class,'fileable');
    }
}
