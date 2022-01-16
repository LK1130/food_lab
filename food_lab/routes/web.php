<?php

use App\Http\Controllers\CategoryController;
use Facade\FlareClient\View;
use App\Http\Controllers\CustomerController;
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

//For customer home page
Route::get('/', [CustomerController::class, 'foodlab']);

/**
 * For salesChart show
 */
Route::get('amountCheck', [SalesController::class, 'amountCheck']);

Route::get('saleChart', function () {
    return View('admin.salesChart.monthlySale');
});
