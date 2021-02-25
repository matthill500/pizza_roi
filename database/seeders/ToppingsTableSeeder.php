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
      $pepperoni->price=0.2;

      $pepperoni->save();

      $cheese = new Topping();
      $cheese->name='Cheese';
      $cheese->price=2.00;

      $cheese->save();

      $sauce = new Topping();
      $sauce->name='Pizza-sauce';
      $sauce->price=0.80;

      $sauce->save();

      $sauce = new Topping();
      $sauce->name='Dough';
      $sauce->price=0.40;

      $sauce->save();

      $ham = new Topping();
      $ham->name='Ham';
      $ham->price=0.50;

      $ham->save();

      $sausage = new Topping();
      $sausage->name='Sausage';
      $sausage->price=0.40;

      $sausage->save();

      $onion = new Topping();
      $onion->name='Onion';
      $onion->price=0.20;

      $onion->save();

      $mushroom = new Topping();
      $mushroom->name='Mushroom';
      $mushroom->price=0.15;

      $mushroom->save();

      $beef = new Topping();
      $beef->name='Beef';
      $beef->price=0.25;

      $beef->save();

      $chorizo = new Topping();
      $chorizo->name='Chorizo';
      $chorizo->price=0.20;

      $chorizo->save();

      $bacon = new Topping();
      $bacon->name='Bacon';
      $bacon->price=0.25;

      $bacon->save();

      $meatball = new Topping();
      $meatball->name='Meatball';
      $meatball->price=0.25;

      $meatball->save();

      $greenAndRedPeppers = new Topping();
      $greenAndRedPeppers->name='Green-and-red-peppers';
      $greenAndRedPeppers->price=0.15;

      $greenAndRedPeppers->save();

      $sweetcorn = new Topping();
      $sweetcorn->name='Sweetcorn';
      $sweetcorn->price=0.10;

      $sweetcorn->save();

      $freshTomato = new Topping();
      $freshTomato->name='Fresh-Tomato';
      $freshTomato->price=0.10;

      $freshTomato->save();

      $pineapple = new Topping();
      $pineapple->name='Pineapple';
      $pineapple->price=0.08;

      $pineapple->save();


    }
}
