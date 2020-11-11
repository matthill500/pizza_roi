<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'age',
        'phone',
        'user_id',
    ];

      public $table = "customers";

    public function user(){
      return $this->belongsTo('App\Models\User');
    }
}
