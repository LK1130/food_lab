<?php

use App\Http\Controllers\CategoryController;
use Facade\FlareClient\View;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\CoinController;
use App\Http\Controllers\DecisionController;
use App\Http\Controllers\FavtypeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\OrderStatusController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\SuggestController;
use App\Http\Controllers\TasteController;
use App\Http\Controllers\TownshipController;
use App\Http\Controllers\customerInfoController;
use App\Http\Controllers\OrderTransactionController;
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

//admin/setting/loginManage
Route::resource('adminLogin', LoginController::class);
//admin/setting/coinRate
Route::resource('coinrate', CoinController::class);
//admin/setting/siteManage
Route::get('siteManage', [SiteController::class, 'siteManage']);
Route::post('siteManage/store', [SiteController::class, 'store']);
//admin/setting/appManage
Route::resource('township', TownshipController::class);
Route::resource('payment', PaymentController::class);
Route::resource('category', CategoryController::class);
Route::resource('taste', TasteController::class);
Route::resource('suggest', SuggestController::class);
Route::resource('favtype', FavtypeController::class);
Route::resource('orderstatus', OrderStatusController::class);
Route::resource('decision', DecisionController::class);
//admin/setting/newsManage
Route::resource('news', NewsController::class);

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
 * For Dashboard & Transaction
 */
Route::get('dashboard', [DashboardController::class, 'dashboardList']);
Route::get('coinchargeList', [DashboardController::class, 'coinchargeList']);
Route::get('orderTransaction', [OrderTransactionController::class, 'orderTransaction']);
Route::get('ordertransactionDetail', [TransactionController::class, 'ordertransactionDetail']);
/**
 * Customer Info
 */
Route::get('customerInfo', [customerInfoController::class, 'customerInfo']);
Route::get('customerinfoDetail', [customerInfoController::class, 'customerinfoDetail']);

//For customer home page
Route::get('/', [CustomerController::class, 'foodlab']);
//admin/setting/loginManage
Route::resource('adminLogin', LoginController::class);

//admin/setting/coinRate
Route::resource('coinrate', CoinController::class);


//_________________________________Start Admin Coin Routes_________________________

Route::get('coinListing',[CoinController::class,'list']);

//_________________________________End Admin Coin Routes_________________________



//_________________________________Chart Routes_________________________
/**
 * For Daily SalesChart show
 */
Route::get('dailyChart', [SalesController::class, 'dailyChart']);

/**
 * For Monthly SalesChart show
 */
Route::get('monthlyChart', [SalesController::class, 'monthlyChart']);

/**
 * For Yearly SalesChart show
 */
Route::get('yearlyChart', [SalesController::class, 'yearlyChart']);

/**
 * For Range Chart show
 */
Route::get('rangeChart', function () {
    return  view('admin.salesChart.rangeSale', ['order' => '', 'coin' => '', 'orderArray' => [], 'coinArray' => [], 'orderDaily' => [], 'coinDaily' => []]);
});
Route::post('rangeChart', [SalesController::class, 'rangeChart']);


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

