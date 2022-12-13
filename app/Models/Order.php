<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    
    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
        'file_name',
        'file_uri',
    ];

    public function products(){
        return $this->belongsTo(Product::class);
    }

    public function users(){
        return $this->belongsTo(User::class);
    }
}
