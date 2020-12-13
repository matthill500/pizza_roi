<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\Pizza;
use App\Models\Side;
use App\Models\Deal;
class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $pizza = Pizza::where('name', 'Pepperoni Passion')->first();
      $side = Side::where('name', 'Chicken Tenders')->first();
      $deal = Deal::where('name', 'The Mega Deal')->first();


      $order = new Order();
      $order->status = 'confirmed';
      $order->comments = 'dont ring bell';
      $order->price = '22';
      $order->coupon_id = 1;
      $order->shop_id = 1;
      $order->customer_id = 1;
      $order->save();

      $order->pizzas()->attach($pizza);
      $order->sides()->attach($side);
      $order->deals()->attach($deal);

      $order2 = new Order();
      $order2->status = 'confirmed';
      $order2->comments = '';
      $order2->price = '42';
      $order2->shop_id = 2;
      $order2->customer_id = 1;
      $order2->save();

      $order2->pizzas()->attach($pizza);
      $order2->sides()->attach($side);


    }
}
