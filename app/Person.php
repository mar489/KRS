<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $table = 'person';

    protected $fillable = ['surname', 'name', 'patronymic', 'phone', 'role'];
}
