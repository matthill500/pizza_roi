<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Side;

class SidesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $chickenTender = new Side();
      $chickenTender->name='Chicken Tenders';
      $chickenTender->retailPrice=4.99;
      $chickenTender->wholesalePrice=0.99;
      $chickenTender->image='storage/images/Chicken-Tenders.jpg';

      $chickenTender->save();

      $cookies = new Side();
      $cookies->name='Cookies';
      $cookies->retailPrice=4.50;
      $cookies->wholesalePrice=0.60;
      $cookies->image='storage/images/cookies.jpg';

      $cookies->save();
    }
}
