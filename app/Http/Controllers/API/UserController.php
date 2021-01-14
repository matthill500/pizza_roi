<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
  public function getSetupIntent($user)
  {
      $user = User::findOrFail($user);

      if ($user->hasPaymentMethod()) {

          $paymentMethod = $user->defaultPaymentMethod();

          return response()->json([
              'status'=> 'success',
              'intent' => $user->createSetupIntent()
          ], 200);
      }

      return response()->json([
          'status'=> 'success',
          'intent' => $user->createSetupIntent()
      ], 200);
  }
}
