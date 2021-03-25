<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\IdealStock;
use Carbon\Carbon;
use DB;
class IdealStockController extends Controller
{
  public function index()
  {
      $idealStocks = IdealStock::all();

      $topStocks = DB::table('ideal_stock')
      ->leftJoin('toppings', 'ideal_stock.top_id', '=', 'toppings.id')
      ->get();

      $sideStocks = DB::table('ideal_stock')
      ->leftJoin('sides', 'ideal_stock.side_id', '=', 'sides.id')
      ->get();

      return response()->json(
        [
            'status' => 'success',
            'data' => $idealStocks,
            'tops' => $topStocks,
            'sides' => $sideStocks
        ],
        200);
  }
  public function store(Request $request){
    $IdealStock = new IdealStock();

    $IdealStock->top_id = $request->input('top_id');
    $IdealStock->side_id = $request->input('side_id');
    $IdealStock->Qty = $request->input('Qty');
    $IdealStock->date = $request->input('date');

    $IdealStock->save();

  }
  public function edit(Request $request)
  {
      $date = Carbon::now()->toDateString();
      $idealStocks = DB::table('ideal_stock')->where('date', '=', $date)->get();

      $cartItemString = $request->input('cart');
      if(is_array($cartItemString)){
        $cartItems = $cartItemString;
      }else{
        $cartItems = json_decode($cartItemString, true);
      }

      foreach($cartItems as $cartItem){
        if($cartItem['product']['type'] === "side"){
          foreach($idealStocks as $idealStock){
          if($cartItem['product']['id'] == $idealStock->side_id){
            $idealStockId = $idealStock->id;
            $newQtySide = $idealStock->Qty += $cartItem['qty'];
            DB::table('ideal_stock')->where('id', '=', $idealStockId)->update(['qty' => $newQtySide]);  
            }
          }
        }else{
        foreach ($cartItem['product']['toppings'] as $key => $topping) {
          foreach($idealStocks as $idealStock){
            if($topping['id'] == $idealStock->top_id){
                $idealStockId = $idealStock->id;
                
                $newQty = $idealStock->Qty += $cartItem['qty'];
             
                DB::table('ideal_stock')->where('id', '=', $idealStockId)->update(['qty' => $newQty]);  
            }
          }
        }
       }
      }

      return response()->json([
        'status'=> 'success',
        'Cart' => $cartItems,
        'idealStocks' => $idealStocks
      ], 200);
  }
}