<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topping extends Model
{
    use HasFactory;

    public function pizzas()
    {
        return $this->belongsToMany('App\Models\Pizza', 'pizza_tops');
    }
    public function stock()
    {
        return $this->hasMany('App\Models\ActualStock');
    }
}
