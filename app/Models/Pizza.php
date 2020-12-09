<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    use HasFactory;

    public function toppings()
    {
        return $this->belongsToMany('App\Models\Topping', 'pizza_tops');
    }

    public function deals()
    {
        return $this->belongsToMany('App\Models\Deal', 'deal_pizza');
    }
}
