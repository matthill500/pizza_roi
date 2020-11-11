<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CustomerAddress;
class CustomerAddressTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $customer = new CustomerAddress();
      $customer->number='16';
      $customer->roadOrStreet='springhill park';
      $customer->area='Glenageary';
      $customer->eircode='A96Y927';
      $customer->customer_id=1;
      $customer->save();

    }
}
