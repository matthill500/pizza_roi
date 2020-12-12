<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Coupon;
class CouponsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $coupon = new Coupon();
      $coupon->name = 'December Coupon';
      $coupon->code = 'DECEMBER2020';
      $coupon->expireDate = '2020-12-31';
      $coupon->discount = 20;
      $coupon->save();
    }
}
