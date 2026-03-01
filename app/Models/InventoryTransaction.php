<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InventoryTransaction extends Model
{
    protected $fillable = ['product_id','qty_change','note','user_id'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}