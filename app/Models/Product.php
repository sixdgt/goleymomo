<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = "products";

    protected $fillable = [
        'product_title',
        'product_description',
        'product_price',
        'product_image',
    ];

    public function orders(){
        return $this->hasMany(Order::class);
    }
}
