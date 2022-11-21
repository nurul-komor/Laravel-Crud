<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\Test;
use Illuminate\Http\Request;

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
Route::get('customers/',[CustomersController::class,'index'])->name('customers.index');
Route::get('customer/create',[CustomersController::class,'create'])->name('customer.create');
Route::post('customer/create',[CustomersController::class,'store']);
Route::get('customer/edit/{id}',[CustomersController::class,'edit']);
Route::put('customer/{id}',[CustomersController::class,'update']);
Route::get('customer/{id}',[CustomersController::class,'destroy']);

Route::get("customers/trash",[CustomersController::class,'trash'])->name('customers.trash');
Route::get("customer/restore/{id}",[CustomersController::class,'restore'])->name('customers.restore');