<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pizza;
use App\Models\Topping;
class PizzasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $top1 = Topping::where('name', 'pepperoni 13.5"')->first();
      $top2 = Topping::where('name', 'cheese 13.5"')->first();
      $top3 = Topping::where('name', 'Pizza sauce 13.5"')->first();
      $top4 = Topping::where('name', 'dough 13.5"')->first();

      $largePepperoniPassion = new Pizza();
      $largePepperoniPassion->name='Pepperoni Passion';
      $largePepperoniPassion->size=13.5;
      $largePepperoniPassion->retailPrice=22;
      $largePepperoniPassion->image='images/Pepperoni-Passion.jpg';

      $largePepperoniPassion->save();

      $largePepperoniPassion->toppings()->attach($top1);
      $largePepperoniPassion->toppings()->attach($top2);
      $largePepperoniPassion->toppings()->attach($top3);
      $largePepperoniPassion->toppings()->attach($top4);


    }
}
