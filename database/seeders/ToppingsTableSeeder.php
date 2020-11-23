<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Topping;
class ToppingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $pepperoni = new Topping();
      $pepperoni->name='Pepperoni';
      $pepperoni->weightGm=0.5;
      $pepperoni->price=0.02;

      $pepperoni->save();
    }
}
