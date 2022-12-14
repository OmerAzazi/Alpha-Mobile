<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;


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

Route::get('/',[HomeController::class, 'index']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('redirect',[HomeController::class, 'redirect'])->middleware('auth','verified');
Route::get('/view_catagory',[AdminController::class, 'view_catagory']);
Route::post('/add_catagory',[AdminController::class, 'add_catagory']);
Route::get('/show_catagory',[AdminController::class, 'show_catagory']);
Route::get('/delete_catagory/{id}',[AdminController::class, 'delete_catagory']);
Route::get('/view_product',[AdminController::class, 'view_product']);
Route::post('/add_product',[AdminController::class, 'add_product']);
Route::get('/show_product',[AdminController::class, 'show_product']);
Route::get('/delete_product/{id}',[AdminController::class, 'delete_product']);
Route::get('/update_product/{id}',[AdminController::class, 'update_product']);
Route::post('/edit_product/{id}',[AdminController::class, 'edit_product']);
Route::get('/product_details/{id}',[HomeController::class, 'product_details']);
Route::post('/add_cart/{id}',[HomeController::class, 'add_cart']);
Route::get('/show_cart',[HomeController::class, 'show_cart']);
Route::get('/delete_item/{id}',[HomeController::class, 'delete_item']);
Route::get('/cash_order',[HomeController::class, 'cash_order']);
Route::get('/stripe/{totalprice}',[HomeController::class, 'stripe']);
Route::post('stripe/{totalprice}',[HomeController::class,'stripePost'])->name('stripe.post');
Route::get('/order',[AdminController::class, 'order']);
Route::get('/delivered/{id}',[AdminController::class, 'delivered']);
route::get('/search',[AdminController::class,'searchdata']);
Route::get('/dashbored',[AdminController::class, 'dashbored']);
Route::get('/profile',[HomeController::class, 'profile']);
Route::get('/allproduct',[HomeController::class, 'allproduct']);
Route::get('/product_search',[HomeController::class, 'product_search']);
Route::get('/send_email/{id}',[AdminController::class, 'send_email']);
Route::post('/send_user_email/{id}',[AdminController::class, 'send_user_email']);























