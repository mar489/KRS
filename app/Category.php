<?php

namespace App;

use App\Scopes\DeleteScope;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    protected $fillable = ['category_name', 'supercategory_id', 'delete'];

    public function products()
    {
        return $this->hasMany(Product::class)->deleted();
    }

    public function supercategory()
    {
        return $this->belongsTo(Supercategory::class);
    }

    public function scopeDeleted($query)
    {
        return $query -> where('delete', '=', 0);
    }

}

