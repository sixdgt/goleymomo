<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DpParichaya extends Model
{
    use HasFactory;

    protected $table = "dp_parichayas";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'dp_gn_name',
        'dp_gn_history',
        'dp_gn_long',
        'dp_gn_lat',
        'dp_gn_boundary',
        'dp_gn_demographics',
        'dp_gn_religion',
        'dp_gn_culture',
        'dp_gn_architecture',
        'dp_gn_city_scape',
        'dp_gn_tourism_area',
        'dp_gn_population',
        'dp_gn_education',
        'dp_gn_healthcare',
        'dp_gn_transport',
        'dp_user_id'
    ];
}
