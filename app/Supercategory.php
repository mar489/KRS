<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supercategory extends Model
{
    protected $table ='supercategory';
    protected $fillable = ['supercategory_name'];

    public function categories()
    {
        return $this->hasMany(Category::class)->deleted();
    }
}
