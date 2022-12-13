<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;

    protected $table = 'sales';
    
    protected $fillable = [
        'user_id',
        'card_amount',
        'cash_amount',
        'sales_desc',
        'sales_voucher',
        'file_name',
    ];

    public function users(){
        return $this->belongsTo(User::class);
    }
}
