<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shop;
class ShopController extends Controller
{
  public function index()
  {
      $shops = Shop::all();

      return response()->json(
        [
            'status' => 'success',
            'data' => $shops
        ],
        200);
  }

  public function show($id)
  {
      $shop = Shop::find($id);

      if ($shop === null) {
        $statusMsg = 'Player not found!';
        $statusCode = 404;
      }
      else {
        $shop->load('shop');
        $statusMsg = 'success';
        $statusCode = 200;
      }

      return response()->json(
        [
            'status' => $statusMsg,
            'data' => $shop
        ],
        $statusCode);
  }
}
