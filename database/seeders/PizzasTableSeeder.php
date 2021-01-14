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
      $top5 = Topping::where('name', 'ham 13.5"')->first();
      $top6 = Topping::where('name', 'sausage 13.5"')->first();
      $top7 = Topping::where('name', 'onion 13.5"')->first();
      $top8 = Topping::where('name', 'mushroom 13.5"')->first();
      $top9 = Topping::where('name', 'beef 13.5"')->first();
      $top10 = Topping::where('name', 'bacon 13.5"')->first();
      $top11 = Topping::where('name', 'chorizo 13.5"')->first();
      $top12 = Topping::where('name', 'meatball 13.5"')->first();
      $top13 = Topping::where('name', 'Green and red peppers 13.5"')->first();
      $top14 = Topping::where('name', 'Sweetcorn 13.5"')->first();
      $top15 = Topping::where('name', 'Fresh tomato 13.5"')->first();
      $top16 = Topping::where('name', 'pineapple 13.5"')->first();


      $largePepperoniPassion = new Pizza();
      $largePepperoniPassion->name='Pepperoni Passion';
      $largePepperoniPassion->size=13.5;
      $largePepperoniPassion->retailPrice=22;
      $largePepperoniPassion->image='storage/images/Pepperoni-Passion.jpg';
      $largePepperoniPassion->type='pizza';
    

      $largePepperoniPassion->save();

      $largePepperoniPassion->toppings()->attach($top1);
      $largePepperoniPassion->toppings()->attach($top2);
      $largePepperoniPassion->toppings()->attach($top3);
      $largePepperoniPassion->toppings()->attach($top4);

      $largeMightyMeaty = new Pizza();
      $largeMightyMeaty->name='Mighty Meaty';
      $largeMightyMeaty->size=13.5;
      $largeMightyMeaty->retailPrice=23;
      $largeMightyMeaty->image='storage/images/Mighty-meaty.jpg';
      $largeMightyMeaty->type='pizza';
    

      $largeMightyMeaty->save();

      $largeMightyMeaty->toppings()->attach($top1);
      $largeMightyMeaty->toppings()->attach($top2);
      $largeMightyMeaty->toppings()->attach($top3);
      $largeMightyMeaty->toppings()->attach($top4);
      $largeMightyMeaty->toppings()->attach($top5);
      $largeMightyMeaty->toppings()->attach($top6);
      $largeMightyMeaty->toppings()->attach($top7);
      $largeMightyMeaty->toppings()->attach($top8);
      $largeMightyMeaty->toppings()->attach($top9);

      $cheeseAndTomato = new Pizza();
      $cheeseAndTomato->name='Original Cheese and Tomato';
      $cheeseAndTomato->size=13.5;
      $cheeseAndTomato->retailPrice=21;
      $cheeseAndTomato->image='storage/images/Cheese-and-tomato.jpg';
      $cheeseAndTomato->type='pizza';
    

      $cheeseAndTomato->save();

      $cheeseAndTomato->toppings()->attach($top2);
      $cheeseAndTomato->toppings()->attach($top3);
      $cheeseAndTomato->toppings()->attach($top4);

      $meatfielder = new Pizza();
      $meatfielder->name='Meatfielder';
      $meatfielder->size=13.5;
      $meatfielder->retailPrice=24;
      $meatfielder->image='storage/images/meatfielder.jpg';
      $meatfielder->type='pizza';
    

      $meatfielder->save();

      $meatfielder->toppings()->attach($top1);
      $meatfielder->toppings()->attach($top2);
      $meatfielder->toppings()->attach($top3);
      $meatfielder->toppings()->attach($top4);
      $meatfielder->toppings()->attach($top5);
      $meatfielder->toppings()->attach($top10);
      $meatfielder->toppings()->attach($top11);
      $meatfielder->toppings()->attach($top12);

      $vegiSupreme = new Pizza();
      $vegiSupreme->name='Vegi Supreme';
      $vegiSupreme->size=13.5;
      $vegiSupreme->retailPrice=24;
      $vegiSupreme->image='storage/images/vegi-supreme.jpg';
      $vegiSupreme->type='pizza';
    

      $vegiSupreme->save();
      $vegiSupreme->toppings()->attach($top2);
      $vegiSupreme->toppings()->attach($top3);
      $vegiSupreme->toppings()->attach($top4);
      $vegiSupreme->toppings()->attach($top7);
      $vegiSupreme->toppings()->attach($top8);
      $vegiSupreme->toppings()->attach($top13);
      $vegiSupreme->toppings()->attach($top14);
      $vegiSupreme->toppings()->attach($top15);

      $Hawaiian = new Pizza();
      $Hawaiian->name='Hawaiian';
      $Hawaiian->size=13.5;
      $Hawaiian->retailPrice=23;
      $Hawaiian->image='storage/images/hawaiian.jpg';
      $Hawaiian->type='pizza';
    

      $Hawaiian->save();
      $Hawaiian->toppings()->attach($top2);
      $Hawaiian->toppings()->attach($top3);
      $Hawaiian->toppings()->attach($top4);
      $Hawaiian->toppings()->attach($top5);
      $Hawaiian->toppings()->attach($top8);
      $Hawaiian->toppings()->attach($top16);


    }
}
