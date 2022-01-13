<?php

use Facade\FlareClient\View;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\SalesController;

Route::resource('adminLogin', LoginController::class);
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

Route::get('asdf', function () {
    return view('admin.settingFolder.loginManageFolder.adminAdd');
});
Route::get('dashboard', function () {
    return View('admin.dashboard');
});
Route::get('orderTransaction', function () {
    return View('admin.transactions.orderTransaction');
});
Route::get('coinchargeList', function () {
    return View('admin.transactions.coinchargeList');
});

//For customer home page
Route::get('/', [CustomerController::class, 'foodlab']);

/**
 * For Monthly SalesChart show
 */
Route::get('monthlyChart' , [SalesController::class,'monthlyCheck']);

/**
 * For Yearly SalesChart show
 */
Route::get('yearlyChart' , [SalesController::class,'yearlyCheck']);

/**
 * For Yearly SalesChart show
 */
Route::get('dailyChart' , [SalesController::class,'dailyCheck']);


