<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Validator;
use App\Models\User;
use App\Models\role;

class PassportController extends Controller
{
  public function register(Request $request){
    $validator = Validator::make($request->all(), [
      'first_name' => 'required|min:3',
      'last_name' => 'required|min:3',
      'email' => 'required|email|unique:users',
      'password' => 'required|min:6',
    ]);

    if($validator->fails()){
      return response()->json($validator->errors(), 422);
    }
    $user = User::create([
      'first_name' => $request->first_name,
      'last_name' => $request->last_name,
      'email' => $request->email,
      'password' => bcrypt($request->password)
    ]);

    $user->roles()->attach(Role::where('name','user')->first());

    $token = $user->createToken('Pizza_ROI')->accessToken;
    return response()->json(['token' => $token], 200);
  }



  public function login(Request $request){
    $validator = Validator::make($request->all(), [
      'email' => 'required|email|exists:users',
      'password' => 'required|min:6',
    ]);

    if($validator->fails()){
      return response()->json(['error' => 'Unauthorized'], 401);
    }

    $credentials = [
      'email' => $request->email,
      'password'=> $request->password
    ];
    if(auth()->attempt($credentials)){
      $user = auth()->user();
      $token = $user->createToken('Pizza_ROI')->accessToken;
      return response()->json([
        'first_name' => $user->first_name,
        'last_name' => $user->last_name,
        'email' => $user->email,
        'token' => $token
      ], 200);
    }else{
      return response()->json(['error' => 'Unauthorized'], 401);
    }
  }

  public function user(){
    return response()->json(['user' => auth()->user()], 200);
  }


  public function logout(Request $request){
    $request->user()->token()->revoke();

    return response()->json(['message' =>'Successfully logged out'], 200);
  }
}
