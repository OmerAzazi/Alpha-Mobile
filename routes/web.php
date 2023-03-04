<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Pos\SupplierController;
use App\Http\Controllers\Pos\CustomerController;
use App\Http\Controllers\Pos\StocksController;
use App\Http\Controllers\Pos\ProductController;
use App\Http\Controllers\Pos\OrderController;
use App\Http\Controllers\FrontEnd\StripeController;
use App\Http\Controllers\Pos\PDFController;








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

//Home all route
Route::get('redirect',[HomeController::class, 'redirect']);
Route::get('/allproduct',[HomeController::class,'allproduct']);
Route::get('/product_details/{id}',[HomeController::class,'product_details']);
Route::Post('/add_cart/{id}',[HomeController::class,'add_cart']);
Route::get('/show_cart',[HomeController::class, 'show_cart']);
Route::get('/delete_item/{id}',[HomeController::class,'delete_item']);
Route::get('/product_search',[HomeController::class,'product_search']);
Route::get('/Checkout/{totalprice}',[HomeController::class,'Checkout']);
Route::post('/CashOnDelivery',[HomeController::class,'CashOnDelivery']);
Route::get('/Order',[HomeController::class,'Order']);
Route::get('/OrderDetail/{id}',[HomeController::class,'OrderDetail']);

//Stripe
Route::get('/stripe/{totalprice}',[StripeController::class,'stripe']);
Route::post('stripe/{totalprice}',[StripeController::class,'stripePost'])->name('stripe.post');

//Admin all route
Route::get('/delivered/{id}',[AdminController::class,'delivered']);
Route::get('/send_email/{id}',[AdminController::class, 'send_email']);
Route::post('/send_user_email/{id}',[AdminController::class, 'send_user_email']);
Route::get('/dash',[AdminController::class,'dashboard']);

//Supplier all route
Route::get('/AllSupplier',[SupplierController::class, 'AllSupplier']);
Route::get('/DeleteSupplier/{id}',[SupplierController::class, 'DeleteSupplier']);
Route::get('/AddSupplier',[SupplierController::class, 'AddSupplier']);
Route::post('/Add_Supplier',[SupplierController::class, 'Add_Supplier']);

//Customer all route
Route::get('/AllCustomer',[CustomerController::class, 'AllCustomer']);
Route::get('/DeleteCustomer/{id}',[CustomerController::class, 'DeleteCustomer']);

//Stocks all route
Route::get('/AllStock',[StocksController::class, 'AllStock']);
Route::get('/DeleteStock/{id}',[StocksController::class, 'DeleteStock']);
Route::get('/AddStock',[StocksController::class, 'AddStock']);
Route::post('/Add_Stock',[StocksController::class, 'Add_Stock']);

//Product All route
Route::get('/AddProduct',[ProductController::class, 'AddProduct']);
Route::post('/Add_Product',[ProductController::class, 'Add_Product']);
Route::get('/AllProduct',[ProductController::class, 'AllProduct']);
Route::get('/DeleteProduct/{id}',[ProductController::class, 'DeleteProduct']);
Route::get('/Update_Product/{id}',[ProductController::class, 'Update_Product']);
Route::post('/UpdateProduct/{id}',[ProductController::class, 'UpdateProduct']);

//Order All route
Route::get('/AllOrder',[OrderController::class, 'AllOrder']);
Route::get('/OrderDetails/{id}',[OrderController::class,'OrderDetails']);
Route::get('/Filter',[OrderController::class, 'Filter']);
Route::get('/UpdateStatus/{id}',[OrderController::class, 'UpdateStatus']);
Route::post('/Update_Status/{id}',[OrderController::class, 'Update_Status']);

//PDF All route
Route::get('generate-pdf/{id}', [PDFController::class, 'generatePDF']);












































