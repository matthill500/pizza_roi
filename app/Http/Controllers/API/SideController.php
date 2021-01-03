<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Side;
class SideController extends Controller
{
  public function index()
  {
      $sides = Side::all();

      return response()->json(
        [
            'status' => 'success',
            'data' => $sides
        ],
        200);
  }

  public function show($id)
  {
      $side = side::find($id);

      if ($side === null) {
        $statusMsg = 'Side not found!';
        $statusCode = 404;
      }
      else {
        $pizza->load('side');
        $statusMsg = 'success';
        $statusCode = 200;
      }

      return response()->json(
        [
            'status' => $statusMsg,
            'data' => $side
        ],
        $statusCode);
  }
}
