<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DishesController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\OrderFormController;

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

Route::get('/', [OrderFormController::class,'index'])->name('home');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/dishes', DishesController::class);
Route::resource('/orders',OrdersController::class);
Route::resource('/order_form',OrderFormController::class);

Route::get('/orders/{order}/approve',[OrdersController::class,'approve']);
Route::get('/orders/{order}/cancel',[OrdersController::class,'cancel']);
Route::get('/orders/{order}/ready',[OrdersController::class,'ready']);
Route::get('/orders/{order}/serve',[OrdersController::class,'serve']);


Auth::routes([
    'register'=>false,
]);

