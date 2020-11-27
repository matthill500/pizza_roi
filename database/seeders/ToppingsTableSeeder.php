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
      $pepperoni->name='Pepperoni 13.5"';
      $pepperoni->pieSize=13.5;
      $pepperoni->weightPerPieGm=20;
      $pepperoni->price=0.2;

      $pepperoni->save();

      $cheese = new Topping();
      $cheese->name='Cheese 13.5"';
      $cheese->pieSize=13.5;
      $cheese->weightPerPieGm=231;
      $cheese->price=2.00;

      $cheese->save();

      $sauce = new Topping();
      $sauce->name='Pizza sauce 13.5"';
      $sauce->pieSize=13.5;
      $sauce->weightPerPieGm=154;
      $sauce->price=0.80;

      $sauce->save();

      $sauce = new Topping();
      $sauce->name='Dough 13.5"';
      $sauce->pieSize=13.5;
      $sauce->price=0.40;

      $sauce->save();

    }
}
