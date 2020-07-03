<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';
    protected $fillable = ['person_id', 'status_id', 'delivery_id', 'comments', 'price', 'delete'];

    public function person()
    {
        return $this->belongsTo(Person::class);
    }

    public function delivery()
    {
        return $this->belongsTo(Delivery::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItems::class);
    }
}
