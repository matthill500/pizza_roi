<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IdealStock extends Model
{
    use HasFactory;

    protected $table = "ideal_stock";
    public $timestamps = false;

    public function topping(){
      return $this->BelongsTo('App\Models\Topping');
    }
    public function side(){
      return $this->BelongsTo('App\Models\Side');
    }
}
