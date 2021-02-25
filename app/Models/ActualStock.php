<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActualStock extends Model
{
    use HasFactory;

    protected $table = "actual_stock";
    public $timestamps = false;

    public function topping(){
      return $this->belongsTo('App\Models\Topping');
    }
    
    public function side(){
      return $this->belongsTo('App\Models\Side');
    }
}
