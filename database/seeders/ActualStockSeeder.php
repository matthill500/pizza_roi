<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ActualStock;
use Carbon\Carbon;

class ActualStockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $pepperoni = new ActualStock();
      $pepperoni->top_id=1;
      $pepperoni->side_id=null;
      $pepperoni->Qty=350;
      $pepperoni->date=Carbon::now()->subDay();

      $pepperoni->save();

      $cheese = new ActualStock();
      $cheese->top_id=2;
      $cheese->side_id=null;
      $cheese->Qty=500;
      $cheese->date=Carbon::now()->subDay();

      $cheese->save();

      $pizzaSauce = new ActualStock();
      $pizzaSauce->top_id=3;
      $pizzaSauce->side_id=null;
      $pizzaSauce->Qty=500;
      $pizzaSauce->date=Carbon::now()->subDay();

      $pizzaSauce->save();

      $dough = new ActualStock();
      $dough->top_id=4;
      $dough->side_id=null;
      $dough->Qty=500;
      $dough->date=Carbon::now()->subDay();

      $dough->save();

      $ham = new ActualStock();
      $ham->top_id=5;
      $ham->side_id=null;
      $ham->Qty=300;
      $ham->date=Carbon::now()->subDay();

      $ham->save();

      $sausage = new ActualStock();
      $sausage->top_id=6;
      $sausage->side_id=null;
      $sausage->Qty=300;
      $sausage->date= Carbon::now()->subDay();

      $sausage->save();

      $onion = new ActualStock();
      $onion->top_id=7;
      $onion->side_id=null;
      $onion->Qty=200;
      $onion->date=Carbon::now()->subDay();

      $onion->save();

      $mushroom = new ActualStock();
      $mushroom->top_id=8;
      $mushroom->side_id=null;
      $mushroom->Qty=200;
      $mushroom->date=Carbon::now()->subDay();

      $mushroom->save();

      $beef = new ActualStock();
      $beef->top_id=9;
      $beef->side_id=null;
      $beef->Qty=200;
      $beef->date=Carbon::now()->subDay();

      $beef->save();

      $chorizo = new ActualStock();
      $chorizo->top_id=10;
      $chorizo->side_id=null;
      $chorizo->Qty=200;
      $chorizo->date=Carbon::now()->subDay();

      $chorizo->save();

      $bacon = new ActualStock();
      $bacon->top_id=11;
      $bacon->side_id=null;
      $bacon->Qty=200;
      $bacon->date=Carbon::now()->subDay();

      $bacon->save();

      $meatball = new ActualStock();
      $meatball->top_id=12;
      $meatball->side_id=null;
      $meatball->Qty=200;
      $meatball->date=Carbon::now()->subDay();

      $meatball->save();

      $greenAndRedPeppers = new ActualStock();
      $greenAndRedPeppers->top_id=13;
      $greenAndRedPeppers->side_id=null;
      $greenAndRedPeppers->Qty=200;
      $greenAndRedPeppers->date=Carbon::now()->subDay();

      $greenAndRedPeppers->save();

      $sweetcorn = new ActualStock();
      $sweetcorn->top_id=14;
      $sweetcorn->side_id=null;
      $sweetcorn->Qty=200;
      $sweetcorn->date=Carbon::now()->subDay();

      $sweetcorn->save();

      $freshTomato = new ActualStock();
      $freshTomato->top_id=15;
      $freshTomato->side_id=null;
      $freshTomato->Qty=200;
      $freshTomato->date=Carbon::now()->subDay();

      $freshTomato->save();

      $pineapple = new ActualStock();
      $pineapple->top_id=16;
      $pineapple->side_id=null;
      $pineapple->Qty=200;
      $pineapple->date=Carbon::now()->subDay();

      $pineapple->save();

      $chickenTender = new ActualStock();
      $chickenTender->top_id=null;
      $chickenTender->side_id=1;
      $chickenTender->Qty=100;
      $chickenTender->date=Carbon::now()->subDay();

      $chickenTender->save();

      $cookies = new ActualStock();
      $cookies->top_id=null;
      $cookies->side_id=2;
      $cookies->Qty=100;
      $cookies->date=Carbon::now()->subDay();

      $cookies->save();



    }
}
