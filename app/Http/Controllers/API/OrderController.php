<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use App\Models\Pizza;
use App\Models\Side;
use App\Models\Deal;
use Auth;

class OrderController extends Controller
{
  public function index()
  {
      $orders = Order::all();

      return response()->json(
        [
            'status' => 'success',
            'data' => $orders
        ],
        200);
  }

  public function store(Request $request)
  {
      $request->validate([
          'status' => 'string',
          'comments' => 'string',
          'price' => 'required',
          'coupon_id' => 'string',
          'shop_id' => 'required',
          'customer_id' => 'required',
          'cart' => ''
      ]);

      $price = round($request->input('price')*100);


      $user = User::findOrFail($request->input('user_id'));
      $paymentMethod = $request->input('token');

      if(!$user->stripe_id) $user->createAsStripeCustomer();

      $user->addPaymentMethod($paymentMethod);

      $charge;

      try {
          $charge = $user->charge($price, $paymentMethod);

      } catch (IncompletePayment $exception) {

          return response()->json([
              'status'=> 'failure',
              'error' => $exception->toArray()
          ], 200);
      }

      $Order = new Order();
      $Order->status = $request->input('status');
      $Order->comments = $request->input('comments');
      $Order->price = $request->input('price');
      $Order->coupon_id = $request->input('coupon_id');
      $Order->shop_id = $request->input('shop_id');
      $Order->customer_id = $request->input('customer_id');
      $Order->stripe_id = $charge->id;

      $Order->save();

      $cartItems = $request->input('cart');

       foreach($cartItems as $cartItem){
           $qty = $cartItem['qty'];
           for($x = 0; $x < $qty; $x++){
            if($cartItem['product']['type'] == "pizza"){
              
            $pizza = Pizza::findOrFail($cartItem['product']['id']);
            $orderItem = new OrderItem();
            $orderItem->pizza_id = $pizza->id;
            $orderItem->order_id = $Order->id;
            $orderItem->save();
            }else if($cartItem['product']['type'] == "side"){
                    
                $side = Side::findOrFail($cartItem['product']['id']);
                $orderItem = new OrderItem();
                $orderItem->side_id = $side->id;
                $orderItem->order_id = $Order->id;
                $orderItem->save();
            }else if($cartItem['product']['type'] == "deal"){
                        
                $deal = Deal::findOrFail($cartItem['product']['id']);
                $orderItem = new OrderItem();
                $orderItem->deal_id = $deal->id;
                $orderItem->order_id = $Order->id;
                $orderItem->save();
            }
        }
    }
      
      return response()->json([
          'status'=> 'success',
          'Order' => $Order->toArray()
      ], 200);
  }
}
