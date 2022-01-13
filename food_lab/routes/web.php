<?php

use Facade\FlareClient\View;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
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
//For Dashboard & Transaction
Route::get('dashboard',[DashboardController::class,'dashboardList']);
Route::get('coinchargeList',[DashboardController::class,'coinchargeList']);
Route::get('orderTransaction',[DashboardController::class,'orderTransaction']);
// Route::get('orderTransaction', function () {
//     return View('admin.transactions.orderTransaction');
// });
// Route::get('coinchargeList', function () {
//     return View('admin.transactions.coinchargeList');
// });
Route::get('ordertransactionDetail', function () {
        return view('admin.transactions.ordertransactionDetail');
});
//For customer home page
Route::get('/', [CustomerController::class, 'foodlab']);

/**
 * For salesChart show
 */
Route::get('amountCheck' , [SalesController::class,'amountCheck']);

Route::get('saleChart', function () {
    return View('admin.salesChart.monthlySale');
});
