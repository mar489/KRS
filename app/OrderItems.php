<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{
    protected $fillable = ['order_id', 'product_id', 'size_id', 'number'];

    public function size()
    {
        return $this->belongsTo(Sizes::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
