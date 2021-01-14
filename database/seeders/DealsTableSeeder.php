<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Deal;
use App\Models\Side;
use App\Models\Pizza;
class DealsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $tenders = Side::where('name', 'Chicken Tenders')->first();
      $cookies = Side::where('name', 'Cookies')->first();
      $passion = Pizza::where('name', 'Pepperoni Passion')->first();


      $theMegaDeal = new Deal();
      $theMegaDeal->name='The Mega Deal';
      $theMegaDeal->description='Large Pizza and 2 x sumptuous sides for only €22.99';
      $theMegaDeal->retailPrice=22.99;
      $theMegaDeal->image='storage/images/mega-deal.png';
      $theMegaDeal->type='deal';

      $theMegaDeal->save();

      $theMegaDeal->sides()->attach($tenders);
      $theMegaDeal->sides()->attach($cookies);
      $theMegaDeal->pizzas()->attach($passion);

    }
}
