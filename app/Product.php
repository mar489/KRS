<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    protected $fillable = ['category_id', 'characteristics_id', 'img_id', 'size_id', 'code', 'product_name', 'price', 'is_available', 'color', 'status', 'description', 'delete'];

    public function img()
    {
        return $this->belongsTo(Img::class);
    }

    public function characteristics()
    {
        return $this->belongsTo(Characteristics::class);
    }

    public function scopeDeleted($query)
    {
        return $query -> where('delete', '=', 0);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
