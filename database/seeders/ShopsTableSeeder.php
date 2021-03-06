<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Shop;
class ShopsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $glenageary = new Shop();
      $glenageary->name='Glenageary';
      $glenageary->shopCode='S27327';
      $glenageary->eircode='A96PD28';
      $glenageary->user_id=3;
      $glenageary->save();

      $dundrum = new Shop();
      $dundrum->name='Dundrum';
      $dundrum->shopCode='S27311';
      $dundrum->eircode='D14EH79';
      $dundrum->user_id=4;
      $dundrum->save();

      $leopardstown = new Shop();
      $leopardstown->name='Leopardstown';
      $leopardstown->shopCode='S27344';
      $leopardstown->eircode='D18K3K4';
      $leopardstown->user_id=5;
      $leopardstown->save();
    }
}
