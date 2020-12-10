<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deal extends Model
{
    use HasFactory;



    public function sides()
    {
        return $this->belongsToMany('App\Models\Side', 'deal_side');
    }

    public function pizzas()
    {
        return $this->belongsToMany('App\Models\Pizza', 'deal_pizza');
    }
}
