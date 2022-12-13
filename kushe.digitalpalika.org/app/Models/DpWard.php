<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DpWard extends Model
{
    use HasFactory;

    protected $table = "dp_wards";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'dp_ward_name',
        'dp_ward_description',
        'dp_ward_address',
        'dp_ward_contact',
        'dp_ward_bg_image',
        'dp_gn_id',
    ];

}
