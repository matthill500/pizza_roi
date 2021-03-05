<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Validator;
use App\Models\User;
use App\Models\Role;
use App\Models\CustomerAddress;
use App\Models\Customer;
use Auth;

class PassportController extends Controller
{
  public function register(Request $request){
    $validator = Validator::make($request->all(), [
      'first_name' => 'required|min:3',
      'last_name' => 'required|min:3',
      'email' => 'required|email|unique:users',
      'phone' => 'required|max:13|min:8',
      'age' => 'required|date',
      'number' => 'required|integer',
      'roadOrStreet' => 'required|string',
      'area' => 'required|string',
      'eircode' => 'required|string',
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

    $uId = $user->id;

    $customer = Customer::create([
      'age' => $request->age,
      'phone' => $request->phone,
      'user_id' => $uId,
    ]);

    $cId = $customer->id;

    $address = CustomerAddress::create([
      'number' => $request->number,
      'roadOrStreet' => $request->roadOrStreet,
      'area' => $request->area,
      'eircode' => $request->eircode,
      'customer_id' => $cId
    ]);

    $token = $user->createToken('Pizza_ROI')->accessToken;
    return response()->json(['token' => $token], 200);
  }



  public function login(Request $request){
    $validator = Validator::make($request->all(), [
      'email' => 'required|email|exists:users',
      'password' => 'required|min:6'
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
        'token' => $token,
        'id' => $user->id,
        'role' => $user->roles
      ], 200);
    }else{
      return response()->json(['error' => 'Unauthorized'], 401);
    }
  }

  public function user(){

    $userId =  auth()->user()->id;
    $customerId = Customer::where("user_id", "=", $userId)->first();
    $customerAddress = CustomerAddress::where("customer_id", "=", $customerId->id)->first();


    return response()->json([
      'user' => auth()->user(),
      'customer' => $customerId,
      'customerAddress' => $customerAddress
    ], 200);
  }


  public function logout(Request $request){
    $request->user()->token()->revoke();

    return response()->json(['message' =>'Successfully logged out'], 200);
  }
}
