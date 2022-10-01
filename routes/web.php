<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
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
   
    return redirect()->route('customers.index');
});
Route::resource('/customers', CustomerController::class);
// Route::get("/customers/{id}/edit",[CustomerController::class,'edit'])->name('customers.edit');