<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pizza;
class PizzaController extends Controller
{
  public function index()
  {
      $pizzas = Pizza::all();

      return response()->json(
        [
            'status' => 'success',
            'data' => $pizzas
        ],
        200);
  }

  public function show($id)
  {
      $pizza = Pizza::find($id);

      if ($pizza === null) {
        $statusMsg = 'Player not found!';
        $statusCode = 404;
      }
      else {
        $pizza->load('pizza');
        $statusMsg = 'success';
        $statusCode = 200;
      }

      return response()->json(
        [
            'status' => $statusMsg,
            'data' => $pizza
        ],
        $statusCode);
  }
}
