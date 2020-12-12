<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Side extends Model
{
    use HasFactory;

    public function deals()
    {
        return $this->belongsToMany('App\Models\Deal', 'deal_side');
    }

    public function orders()
    {
        return $this->belongsToMany('App\Models\Order', 'order_item');
    }
}
