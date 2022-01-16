<?php

use Facade\FlareClient\View;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\CoinController;
use App\Http\Controllers\SalesController;


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

//admin/setting/loginManage
Route::resource('adminLogin', LoginController::class);

//admin/setting/coinRate
Route::resource('coinrate', CoinController::class);

Route::get('dashboard', function () {
    return View('admin.dashboard');
});

Route::get('orderTransaction', function () {
    return View('admin.transactions.orderTransaction');
});

Route::get('coinchargeList', function () {
    return View('admin.transactions.coinchargeList');
});

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

/*
 * For Access Page
 */
Route::get('/access',[CustomerController::class,'access']);

/*
 * For Register Form
 */
Route::post('/access',[CustomerController::class,'register']);

/*
 * For Login Page
 */
Route::get('/login',[CustomerController::class,'login']);

