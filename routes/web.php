<?php

use App\Http\Livewire\Cart;
use App\Http\Livewire\MyOrder;
use App\Http\Livewire\MyOrders;
use App\Http\Livewire\Product;
use App\Http\Livewire\StoreFront;
use App\Http\Livewire\ViewOrder;
use App\Mail\AbandonedCartReminder;
use App\Models\User;
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

Route::get('/', StoreFront::class)->name('home');
Route::get('/product/{productId}', Product::class)->name('product');
Route::get('/cart', Cart::class)->name('cart');

Route::get('/preview',function(){
    $cart = User::first()->cart;
    return new AbandonedCartReminder($cart);

});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
Route::get('/checkout-status', Cart::class)->name('checkout-status');
Route::get('/order/{orderId}', ViewOrder::class)->name('view-order');
Route::get('/my-orders', MyOrders::class)->name('my-orders');
});
