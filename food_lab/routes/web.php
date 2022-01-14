<?php

use Facade\FlareClient\View;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\CoinController;
use App\Http\Controllers\customerInfoController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\TransactionController;

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

/**
 * For Dashboard & Transaction
 */
Route::get('dashboard',[DashboardController::class,'dashboardList']);
Route::get('coinchargeList',[DashboardController::class,'coinchargeList']);
Route::get('orderTransaction',[DashboardController::class,'orderTransaction']);
Route::get('ordertransactionDetail',[TransactionController::class,'ordertransactionDetail']);
/**
 * Customer Info
 */
Route::get('customerInfo',[customerInfoController::class,'customerInfo']);
Route::get('customerinfoDetail',[customerInfoController::class,'customerinfoDetail']);

//For customer home page
Route::get('/', [CustomerController::class, 'foodlab']);
//admin/setting/loginManage
Route::resource('adminLogin', LoginController::class);

//admin/setting/coinRate
Route::resource('coinrate', CoinController::class);


/**
 * For salesChart show
 */
Route::get('amountCheck', [SalesController::class, 'amountCheck']);

Route::get('saleChart', function () {
    return View('admin.salesChart.monthlySale');
});


//_________________________________Customer Routes_________________________

/*
 * For customer home page
*/
Route::get('/', [CustomerController::class, 'foodlab']);

/*
 * For Policy Info Page
*/
Route::get('/policyinfo', [CustomerController::class, 'policy']);

/*
 * For Reprot Page
*/
Route::get('/report', [CustomerController::class, 'report']);

/*
 * From Report Page to store form data in database
*/
Route::post('/report', [CustomerController::class, 'reportData']);

/*
 * For Suggest Page */
Route::get('/suggest', [CustomerController::class, 'suggest']);
