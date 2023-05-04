<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;

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

// Add to Cart Route
Route::get('add/to/cart/{id}',[CartController::class,'AddCart']);
Route::get('check',[CartController::class,'check']);
Route::post('cart/product/add/{id}',[CartController::class,'AddPro']);
Route::get('product/cart',[CartController::class,'ShowCart'])->name('show.cart');
Route::get('remove/cart/{rowId}',[CartController::class,'removeCart']);


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/user/product/cart', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::post('/admin/order', [App\Http\Controllers\HomeController::class, 'adminOrder'])->name('admin.order');



