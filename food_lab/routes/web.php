<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;

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

Route::get('coinrate', function () {
    return view('admin.settingFolder.coinRateFolder.coinRate');
});

Route::get('/', [CustomerController::class, 'foodlab']);

/**
 * For salesChart show
 */
Route::get('salesChart' , [SalesController::class,'salesChart']);
