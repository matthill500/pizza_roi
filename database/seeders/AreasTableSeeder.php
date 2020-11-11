<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Area;
class AreasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $dunLaoghaire = new Area();
      $dunLaoghaire->area='Dun Laoghaire';
      $dunLaoghaire->shop_id=1;
      $dunLaoghaire->save();

      $dalkey = new Area();
      $dalkey->area='Dalkey';
      $dalkey->shop_id=1;
      $dalkey->save();

      $ballybrack = new Area();
      $ballybrack->area='Ballybrack';
      $ballybrack->shop_id=1;
      $ballybrack->save();

      $shankill = new Area();
      $shankill->area='Shankill';
      $shankill->shop_id=1;
      $shankill->save();

      $monkstown = new Area();
      $monkstown->area='Monkstown';
      $monkstown->shop_id=1;
      $monkstown->save();
    }
}
