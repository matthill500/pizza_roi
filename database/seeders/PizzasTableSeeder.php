<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pizza;
class PizzasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $largePepperoniPassion = new Pizza();
      $largePepperoniPassion->name='Pepperoni Passion';
      $largePepperoniPassion->size=13.5;
      $largePepperoniPassion->retailPrice=22;
      $largePepperoniPassion->wholesalePrice=3;

      $largePepperoniPassion->save();

      $mediumPepperoniPassion = new Pizza();
      $mediumPepperoniPassion->name='Pepperoni Passion';
      $mediumPepperoniPassion->size=11.5;
      $mediumPepperoniPassion->retailPrice=17;
      $mediumPepperoniPassion->wholesalePrice=2;

      $mediumPepperoniPassion->save();

      $smallPepperoniPassion = new Pizza();
      $smallPepperoniPassion->name='Pepperoni Passion';
      $smallPepperoniPassion->size=9.5;
      $smallPepperoniPassion->retailPrice=12;
      $smallPepperoniPassion->wholesalePrice=1;

      $smallPepperoniPassion->save();
    }
}
