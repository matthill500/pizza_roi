<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function coupon()
    {
        return $this->belongsTo('App\Models\Coupon');
    }

    public function deals()
    {
        return $this->belongsToMany('App\Models\Deal', 'order_items');
    }

    public function pizzas()
    {
        return $this->belongsToMany('App\Models\Pizza', 'order_items');
    }

    public function sides()
    {
        return $this->belongsToMany('App\Models\Side', 'order_items');
    }

    public function shop()
    {
        return $this->belongsTo('App\Models\Shop');
    }

    public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }

}
