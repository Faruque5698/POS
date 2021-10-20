<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\SuplierController;
use App\Http\Controllers\TransectionController;
use App\Http\Controllers\UserController;
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

Route::get('/home', 'HomeController@index')->name('home');


//Route::resource('products', ProductController::class);
//Route::resource('suppliers', SuplierController::class);
//Route::resource('companies', CompanyController::class);
//Route::resource('users', UserController::class);
//Route::resource('transaction', TransectionController::class);

//Users

Route::get('users',[UserController::class,'index']);
Route::post('users/store',[UserController::class,'store']);
Route::post('/users/Update',[UserController::class,'update'])->name('userUpdate');
Route::get('/users/delete/{id}',[UserController::class,'destroy'])->name('userDelete');

//orders

Route::get('orders',[OrderController::class,'index']);


//transaction

Route::get('transactions',[TransectionController::class,'index']);

//products

Route::get('product',[ProductController::class,'index']);

//supplier
Route::get('supplier',[SuplierController::class,'index']);

