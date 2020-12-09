<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin/home', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin.home');
Route::get('/user/home', [App\Http\Controllers\User\HomeController::class, 'index'])->name('user.home');
Route::get('/shop/home', [App\Http\Controllers\Shop\HomeController::class, 'index'])->name('shop.home');

//Admin Users
Route::get('/admin/users', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.users.index');
Route::get('/admin/users/create', [App\Http\Controllers\Admin\UserController::class, 'create'])->name('admin.users.create');
Route::post('/admin/users/store', [App\Http\Controllers\Admin\UserController::class, 'store'])->name('admin.users.store');
Route::get('/admin/users/{id}/edit', [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('admin.users.edit');
Route::put('/admin/users/{id}', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('admin.users.update');
Route::delete('/admin/users/{id}', [App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('admin.users.destroy');

//Admin Shops
Route::get('/admin/shops', [App\Http\Controllers\Admin\ShopController::class, 'index'])->name('admin.shops.index');
Route::get('/admin/shops/create', [App\Http\Controllers\Admin\ShopController::class, 'create'])->name('admin.shops.create');
Route::post('/admin/shops/store', [App\Http\Controllers\Admin\ShopController::class, 'store'])->name('admin.shops.store');
Route::get('/admin/shops/{id}/edit', [App\Http\Controllers\Admin\ShopController::class, 'edit'])->name('admin.shops.edit');
Route::put('/admin/shops/{id}', [App\Http\Controllers\Admin\ShopController::class, 'update'])->name('admin.shops.update');
Route::delete('/admin/shops/{id}', [App\Http\Controllers\Admin\ShopController::class, 'destroy'])->name('admin.shops.destroy');

//Admin Areas
Route::get('/admin/areas', [App\Http\Controllers\Admin\AreaController::class, 'index'])->name('admin.areas.index');
Route::get('/admin/areas/create', [App\Http\Controllers\Admin\AreaController::class, 'create'])->name('admin.areas.create');
Route::post('/admin/areas/store', [App\Http\Controllers\Admin\AreaController::class, 'store'])->name('admin.areas.store');
Route::get('/admin/areas/{id}/edit', [App\Http\Controllers\Admin\AreaController::class, 'edit'])->name('admin.areas.edit');
Route::put('/admin/areas/{id}', [App\Http\Controllers\Admin\AreaController::class, 'update'])->name('admin.areas.update');
Route::delete('/admin/areas/{id}', [App\Http\Controllers\Admin\AreaController::class, 'destroy'])->name('admin.areas.destroy');

//Admin Pizzas
Route::get('/admin/pizzas', [App\Http\Controllers\Admin\PizzaController::class, 'index'])->name('admin.pizzas.index');
Route::get('/admin/pizzas/create', [App\Http\Controllers\Admin\PizzaController::class, 'create'])->name('admin.pizzas.create');
Route::post('/admin/pizzas/store', [App\Http\Controllers\Admin\PizzaController::class, 'store'])->name('admin.pizzas.store');
Route::get('/admin/questions/{id}', [App\Http\Controllers\Admin\PizzaController::class, 'show'])->name('admin.pizzas.show');
Route::get('/admin/pizzas/{id}/edit', [App\Http\Controllers\Admin\PizzaController::class, 'edit'])->name('admin.pizzas.edit');
Route::put('/admin/pizzas/{id}', [App\Http\Controllers\Admin\PizzaController::class, 'update'])->name('admin.pizzas.update');
Route::delete('/admin/pizzas/{id}', [App\Http\Controllers\Admin\PizzaController::class, 'destroy'])->name('admin.pizzas.destroy');

//Admin Toppings
Route::get('/admin/toppings', [App\Http\Controllers\Admin\ToppingController::class, 'index'])->name('admin.toppings.index');
Route::get('/admin/toppings/create', [App\Http\Controllers\Admin\ToppingController::class, 'create'])->name('admin.toppings.create');
Route::post('/admin/toppings/store', [App\Http\Controllers\Admin\ToppingController::class, 'store'])->name('admin.toppings.store');
Route::get('/admin/toppings/{id}/edit', [App\Http\Controllers\Admin\ToppingController::class, 'edit'])->name('admin.toppings.edit');
Route::put('/admin/toppings/{id}', [App\Http\Controllers\Admin\ToppingController::class, 'update'])->name('admin.toppings.update');
Route::delete('/admin/toppings/{id}', [App\Http\Controllers\Admin\ToppingController::class, 'destroy'])->name('admin.toppings.destroy');

//Admin Sides
Route::get('/admin/sides', [App\Http\Controllers\Admin\SideController::class, 'index'])->name('admin.sides.index');
Route::get('/admin/sides/create', [App\Http\Controllers\Admin\SideController::class, 'create'])->name('admin.sides.create');
Route::post('/admin/sides/store', [App\Http\Controllers\Admin\SideController::class, 'store'])->name('admin.sides.store');
Route::get('/admin/sides/{id}/edit', [App\Http\Controllers\Admin\SideController::class, 'edit'])->name('admin.sides.edit');
Route::put('/admin/sides/{id}', [App\Http\Controllers\Admin\SideController::class, 'update'])->name('admin.sides.update');
Route::delete('/admin/sides/{id}', [App\Http\Controllers\Admin\SideController::class, 'destroy'])->name('admin.sides.destroy');

//Admin Deals
Route::get('/admin/deals', [App\Http\Controllers\Admin\DealController::class, 'index'])->name('admin.deals.index');
Route::get('/admin/deals/create', [App\Http\Controllers\Admin\DealController::class, 'create'])->name('admin.deals.create');
Route::post('/admin/deals/store', [App\Http\Controllers\Admin\DealController::class, 'store'])->name('admin.deals.store');
Route::get('/admin/deals/{id}', [App\Http\Controllers\Admin\DealController::class, 'show'])->name('admin.deals.show');
Route::get('/admin/deals/{id}/edit', [App\Http\Controllers\Admin\DealController::class, 'edit'])->name('admin.deals.edit');
Route::put('/admin/deals/{id}', [App\Http\Controllers\Admin\DealController::class, 'update'])->name('admin.deals.update');
Route::delete('/admin/deals/{id}', [App\Http\Controllers\Admin\DealController::class, 'destroy'])->name('admin.deals.destroy');
