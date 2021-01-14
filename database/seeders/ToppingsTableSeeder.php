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

      $ham = new Topping();
      $ham->name='Ham 13.5"';
      $ham->pieSize=13.5;
      $ham->price=0.50;

      $ham->save();

      $sausage = new Topping();
      $sausage->name='Sausage 13.5"';
      $sausage->pieSize=13.5;
      $sausage->price=0.40;

      $sausage->save();

      $onion = new Topping();
      $onion->name='Onion 13.5"';
      $onion->pieSize=13.5;
      $onion->price=0.20;

      $onion->save();

      $mushroom = new Topping();
      $mushroom->name='Mushroom 13.5"';
      $mushroom->pieSize=13.5;
      $mushroom->price=0.15;

      $mushroom->save();

      $beef = new Topping();
      $beef->name='Beef 13.5"';
      $beef->pieSize=13.5;
      $beef->price=0.25;

      $beef->save();

      $chorizo = new Topping();
      $chorizo->name='Chorizo 13.5"';
      $chorizo->pieSize=13.5;
      $chorizo->price=0.20;

      $chorizo->save();

      $bacon = new Topping();
      $bacon->name='Bacon 13.5"';
      $bacon->pieSize=13.5;
      $bacon->price=0.25;

      $bacon->save();

      $meatball = new Topping();
      $meatball->name='Meatball 13.5"';
      $meatball->pieSize=13.5;
      $meatball->price=0.25;

      $meatball->save();

      $greenAndRedPeppers = new Topping();
      $greenAndRedPeppers->name='Green and red peppers 13.5"';
      $greenAndRedPeppers->pieSize=13.5;
      $greenAndRedPeppers->price=0.15;

      $greenAndRedPeppers->save();

      $sweetcorn = new Topping();
      $sweetcorn->name='Sweetcorn 13.5"';
      $sweetcorn->pieSize=13.5;
      $sweetcorn->price=0.10;

      $sweetcorn->save();

      $freshTomato = new Topping();
      $freshTomato->name='Fresh Tomato 13.5"';
      $freshTomato->pieSize=13.5;
      $freshTomato->price=0.10;

      $freshTomato->save();

      $pineapple = new Topping();
      $pineapple->name='Pineapple 13.5"';
      $pineapple->pieSize=13.5;
      $pineapple->price=0.08;

      $pineapple->save();


    }
}
