<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\PassportController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('register', [PassportController::class,'register']);
Route::post('login', [PassportController::class,'login']);

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::middleware('auth:api')->group(function () {

  Route::get('user', [PassportController::class,'user']);
  Route::post('logout', [PassportController::class,'logout']);

  Route::resource('pizzas', 'App\Http\Controllers\API\PizzaController');
  Route::resource('sides', 'App\Http\Controllers\API\SideController');
  Route::resource('deals', 'App\Http\Controllers\API\DealController');
  Route::resource('shops', 'App\Http\Controllers\API\ShopController');


  Route::post('IdealStock', [App\Http\Controllers\API\IdealStockController::class,'edit']);
  Route::post('orders', [App\Http\Controllers\API\OrderController::class,'store']);

  Route::get('/user/setup-intent/{id}', [App\Http\Controllers\API\UserController::class,'getSetupIntent']);

});
