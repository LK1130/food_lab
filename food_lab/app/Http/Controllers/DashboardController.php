<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\M_AD_CoinRate;
use App\Models\T_AD_CoinCharge;
use App\Models\T_AD_Order;
use App\Models\T_CU_Customer;
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

        $detail = new T_AD_Order();
        $orderdetail = $detail->DashboardMinitrans();

        $customer = new T_CU_Customer();
        $customerlist = $customer->DashboardMinicus();

        $coin = new T_AD_CoinCharge();
        $coincharge  = $coin->Dashboardminicoin();
        
        $tcount = new T_AD_Order();
        $transcount1 = $tcount->Dashboardtranscount();
        
        $cuscount = new T_CU_Customer();
        $customercount = $cuscount->Dashboardcuscount();

        $rateofcoin =new M_AD_CoinRate();
        $coinrate = $rateofcoin->DashboardCoinrate();
        return view('admin.dashboard',['t_cu_customer'=>$customerlist,'orderdetail'=>$orderdetail ,'coincharge'=>$coincharge ,'tcount'=>$transcount1 ,'cuscount'=>$customercount ,'coinrate'=>$coinrate]);
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
