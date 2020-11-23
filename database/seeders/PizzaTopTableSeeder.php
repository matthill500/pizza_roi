<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PizzaTop;
use App\Models\Pizza;
use App\Models\Topping;
class PizzaTopTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $passion = new PizzaTop();
      $passion->pizza_id=1;
      $passion->topping_id=1;
      $passion->weightTopPerPieGm=20;

      $passion->save();
    }
}
