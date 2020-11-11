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
