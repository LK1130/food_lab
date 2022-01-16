<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{    
        /*
    * Create:Zarni(2022/01/12) 
    * Update: 
    * This is function is to show admin dashboard Listing
    * Return is view (dashboard.blade.php)
    */
    public function dashboardList(){
        $customer = DB::table('t_cu_customer')
        ->paginate(5);

        return view('admin.dashboard',['t_cu_customer'=>$customer]);
    }
        /*
    * Create:zarni(2022/01/12) 
    * Update: 
    * This is function is to show admin Coin charge List.
    * Return is view (coinchargeList.blade.php)
    */
    public function coinchargeList(){
        return view('admin.transactions.coinchargeList');
    }
        /*
    * Create:zarni(2022/01/12) 
    * Update: 
    * This is function is to show Order Transaction.
    * Return is view (ordertransaction.blade.php)
    */
    public function orderTransaction(){
        return view('admin.transactions.orderTransaction');
    }
}
