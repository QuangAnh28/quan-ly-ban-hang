<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id','sku','name','unit',
        'price_sell','price_buy',
        'stock','low_stock','is_active'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}