<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Deal;
class DealController extends Controller
{
  public function index()
  {
      $deals = Deal::all();

      return response()->json(
        [
            'status' => 'success',
            'data' => $deals
        ],
        200);
  }

  public function show($id)
  {
      $deal = Deal::find($id);

      if ($deal === null) {
        $statusMsg = 'deal not found!';
        $statusCode = 404;
      }
      else {
        $deal->load('deal');
        $statusMsg = 'success';
        $statusCode = 200;
      }

      return response()->json(
        [
            'status' => $statusMsg,
            'data' => $deal
        ],
        $statusCode);
  }
}
