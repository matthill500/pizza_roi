<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;
class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $customer = new Customer();
      $customer->age='1995-05-27';
      $customer->phone='0862120695';
      $customer->user_id=2;
      $customer->save();

    }
}
