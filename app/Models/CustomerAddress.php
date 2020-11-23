<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerAddress extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'roadOrStreet',
        'area',
        'eircode',
        'customer_id',
    ];

    public $table = "customer_address";

    public function customer(){
      return $this->belongsTo('App\Models\Customer');
    }
}
