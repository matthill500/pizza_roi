<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ActualStock;
use Carbon\Carbon;
use DB;
class ActualStockController extends Controller
{
  public function index()
  {
       $actualStocks = ActualStock::all();
       $topStocks = DB::table('actual_stock')
      ->leftJoin('toppings', 'actual_stock.top_id', '=', 'toppings.id')
      ->get();

      $sideStocks = DB::table('actual_stock')
      ->leftJoin('sides', 'actual_stock.side_id', '=', 'sides.id')
      ->get();


      return response()->json(
        [
            'status' => 'success',
            'data'=> $actualStocks,
            'tops' => $topStocks,
            'sides' => $sideStocks
        ],
        200);
  }
}