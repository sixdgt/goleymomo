<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commission extends Model
{
    use HasFactory;

    protected $table = 'commissions';
    
    protected $fillable = [
        'user_id',
        'commission_rate',
        'commission_status',
    ];

    public function users(){
        return $this->belongsTo(User::class);
    }
}
