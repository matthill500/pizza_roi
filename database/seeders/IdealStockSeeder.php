<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\IdealStock;

class IdealStockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $pepperoni = new IdealStock();
      $pepperoni->top_id=1;
      $pepperoni->side_id=null;
      $pepperoni->Qty=0;

      $pepperoni->save();

      $cheese = new IdealStock();
      $cheese->top_id=2;
      $cheese->side_id=null;
      $cheese->Qty=0;

      $cheese->save();

      $pizzaSauce = new IdealStock();
      $pizzaSauce->top_id=3;
      $pizzaSauce->side_id=null;
      $pizzaSauce->Qty=0;

      $pizzaSauce->save();

      $dough = new IdealStock();
      $dough->top_id=4;
      $dough->side_id=null;
      $dough->Qty=0;

      $dough->save();

      $ham = new IdealStock();
      $ham->top_id=5;
      $ham->side_id=null;
      $ham->Qty=0;

      $ham->save();

      $sausage = new IdealStock();
      $sausage->top_id=6;
      $sausage->side_id=null;
      $sausage->Qty=0;

      $sausage->save();

      $onion = new IdealStock();
      $onion->top_id=7;
      $onion->side_id=null;
      $onion->Qty=0;

      $onion->save();

      $mushroom = new IdealStock();
      $mushroom->top_id=8;
      $mushroom->side_id=null;
      $mushroom->Qty=0;

      $mushroom->save();

      $beef = new IdealStock();
      $beef->top_id=9;
      $beef->side_id=null;
      $beef->Qty=0;

      $beef->save();

      $chorizo = new IdealStock();
      $chorizo->top_id=10;
      $chorizo->side_id=null;
      $chorizo->Qty=0;

      $chorizo->save();

      $bacon = new IdealStock();
      $bacon->top_id=11;
      $bacon->side_id=null;
      $bacon->Qty=0;

      $bacon->save();

      $meatball = new IdealStock();
      $meatball->top_id=12;
      $meatball->side_id=null;
      $meatball->Qty=0;

      $meatball->save();

      $greenAndRedPeppers = new IdealStock();
      $greenAndRedPeppers->top_id=13;
      $greenAndRedPeppers->side_id=null;
      $greenAndRedPeppers->Qty=0;

      $greenAndRedPeppers->save();

      $sweetcorn = new IdealStock();
      $sweetcorn->top_id=14;
      $sweetcorn->side_id=null;
      $sweetcorn->Qty=0;

      $sweetcorn->save();

      $freshTomato = new IdealStock();
      $freshTomato->top_id=15;
      $freshTomato->side_id=null;
      $freshTomato->Qty=0;

      $freshTomato->save();

      $pineapple = new IdealStock();
      $pineapple->top_id=16;
      $pineapple->side_id=null;
      $pineapple->Qty=0;

      $pineapple->save();

      $chickenTender = new IdealStock();
      $chickenTender->top_id=null;
      $chickenTender->side_id=1;

      $chickenTender->save();

      $cookies = new IdealStock();
      $cookies->top_id=null;
      $cookies->side_id=2;

      $cookies->save();

    }
}
