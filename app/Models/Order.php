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
   
  
    public function shop()
    {
        return $this->belongsTo('App\Models\Shop');
    }

    public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }

}
