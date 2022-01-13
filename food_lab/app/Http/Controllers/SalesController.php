<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CoinChargeFinance;
use App\Models\OrderTransactionCheck;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SalesController extends Controller
{   
     /*
     * Create : Cherry(11/1/2022)
     * Update :Cherry(12/1/2022)
     * Explain of function : For getting total order amount  of monthly from t_ad_order and 
     *                         total money amount of monthly from  t_ad_coincharge_finance
     * Prarmeter : no
     * return : view 'admin.salesChart.monthlySale' with compact('coin','order')) ; 
     * */
    public function monthlyCheck()
    {
        $current = Carbon::now()->year;
        $coin= CoinChargeFinance::select(
            DB::raw('year(created_at) as year'),
            DB::raw('month(created_at) as month'),
            DB::raw('sum(amount) as totalAmount'),
        )
        ->whereBetween( DB::raw('year(created_at)'),[$current-1,$current])
        ->groupBy('year')
        ->groupBy('month')
        ->get();

        $coinArray = [];
        foreach($coin as $key => $value){
            array_push($coinArray, $value->totalAmount);
        };

        $order= OrderTransactionCheck::select(
            
            DB::raw('year(order_date) as year'),
            DB::raw('month(order_date) as month'),
            DB::raw('count(id) as totalorder'),
        )
        ->whereBetween( DB::raw('year(order_date)'),[$current-1,$current])
        ->groupBy('year')
        ->groupBy('month')
        ->get();

        $orderArray = [];
        
       
        foreach($order as $key => $value){
            array_push($orderArray, $value->totalorder);
        };
        return  view('admin.salesChart.monthlySale', ['order' => $order , 'coin' => $coin, 'orderArray' => $orderArray, 'coinArray' => $coinArray]) ; 
    }
  /*
     * Create : Cherry(12/1/2022)
     * Update :
     * Explain of function : For getting total order amount  of yearly from t_ad_order and 
     *                         total money amount of yearly from  t_ad_coincharge_finance
     * Prarmeter : no
     * return : view 'admin.salesChart.monthlySale' with compact('coin','order')) ; 
     * */
    public function yearlyCheck()
    {
        $coin= CoinChargeFinance::select(
            DB::raw('year(created_at) as year'),
            DB::raw('sum(amount) as totalAmount'),
        )
        ->orderBy(DB::raw('year(created_at)'), 'ASC')
        ->groupBy('year')
        ->get();

        $coinArray = [];
        
        foreach($coin as $key => $value){
            array_push($coinArray, $value->totalAmount);
        };
       
        $order= OrderTransactionCheck::select(
            DB::raw('year(order_date) as year'),
            DB::raw('count(id) as totalorder'),
        )
        ->orderBy(DB::raw('year(order_date)'), 'ASC')
        ->groupBy('year')
        ->get();
        
        $orderArray = [];
        foreach($order as $key => $value){
            array_push($orderArray, $value->totalorder);
        };

        $yearCount= [];
        $current = Carbon::now()->year;
        $perviousYear= $current-3;
        for($yearPlus=1; $yearPlus<2029; $yearPlus++)
        {
            array_push($yearCount, $perviousYear++);
        }
      
        return  view('admin.salesChart.yearlySale', ['order' => $order , 'coin' => $coin, 'orderArray' => $orderArray, 'coinArray' => $coinArray, 'yearCount' =>$yearCount]) ; 
}
        
    /*
     * Create : Cherry(13/1/2022)
     * Update :
     * Explain of function : For getting total order amount  of daily from t_ad_order and 
     *                         total money amount of daily from  t_ad_coincharge_finance
     * Prarmeter : no
     * return : view 'admin.salesChart.monthlySale' with compact('coin','order')) ; 
     * */
    public function dailyCheck()
    {
        $coin= CoinChargeFinance::select(
            DB::raw('date(created_at) as date '),
            DB::raw('sum(amount) as totalAmount'),
        )
        ->orderBy(DB::raw('created_at'), 'ASC')
        ->groupBy('date')
        ->get();

        $coinArray = [];
        
        foreach($coin as $key => $value){
            array_push($coinArray, $value->totalAmount);
        };
       

        $order= OrderTransactionCheck::select(
        
            DB::raw('order_date as date'),
            DB::raw('count(id) as totalorder'),
        )
        ->where(DB::raw('month(order_date)'), DB::raw('MONTH(CURRENT_DATE())'))
        ->where(DB::raw('year(order_date)'), DB::raw('YEAR(CURRENT_DATE())'))
        ->orderBy(DB::raw('order_date'), 'ASC')
        ->groupBy('date')
        ->get();
        
        $dailyArray = [];
        foreach($order as $key => $value){
            array_push($dailyArray, $value->date);
        };  

        $orderArray = [];
        foreach($order as $key => $value){
            array_push($orderArray, $value->totalorder);
        };    
        return  view('admin.salesChart.dailySale', ['order' => $order , 'coin' => $coin, 'orderArray' => $orderArray, 'coinArray' => $coinArray, 'dailyArray'=> $dailyArray]) ; 
    }
}
