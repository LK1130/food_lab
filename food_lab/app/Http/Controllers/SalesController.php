<?php

namespace App\Http\Controllers;

use App\Http\Requests\RangeChart;
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
     * Create : Cherry(13/1/2022)
     * Update :Cherry(14/1/2022)
     * Explain of function : For getting total order amount  of daily from t_ad_order and 
     *                         total money amount of daily from  t_ad_coincharge_finance
     * Prarmeter : no
     * return : view 'admin.salesChart.dailySale'; 
     * */
    public function dailyChart()
    {   
        $currentYear = Carbon::now()->year;
        $currentMonth = Carbon::now()->month;

        $coin= CoinChargeFinance::select(
            DB::raw('date(created_at) as date '),
            DB::raw('sum(amount) as totalAmount'),
        )
        ->where(DB::raw('month(created_at)'), $currentMonth)
        ->where(DB::raw('year(created_at)'), $currentYear)
        ->orderBy(DB::raw('created_at'), 'ASC')
        ->groupBy('date')
        ->get();
        
        $coinDaily = [];
        foreach($coin as $key => $value){
            array_push($coinDaily, $value->date);
        };  
        $coinArray = [];
        foreach($coin as $key => $value){
            array_push($coinArray, $value->totalAmount);
        };

        $order= OrderTransactionCheck::select(
            DB::raw('order_date as date'),
            DB::raw('count(id) as totalorder'),
        )
        ->where(DB::raw('month(order_date)'), $currentMonth)
        ->where(DB::raw('year(order_date)'), $currentYear)
        ->orderBy(DB::raw('order_date'), 'ASC')
        ->groupBy('date')
        ->get();
        
        $orderDaily = [];
        foreach($order as $key => $value){
            array_push($orderDaily, $value->date);
        };  

        $orderArray = [];
        foreach($order as $key => $value){
            array_push($orderArray, $value->totalorder);
        };    
        return  view('admin.salesChart.dailySale', ['order' => $order , 'coin' => $coin, 'orderArray' => $orderArray, 'coinArray' => $coinArray, 'orderDaily'=> $orderDaily, 'coinDaily'=> $coinDaily]) ; 
    }
     /*
     * Create : Cherry(11/1/2022)
     * Update :Cherry(14/1/2022)
     * Explain of function : For getting total order amount  of monthly from t_ad_order and 
     *                         total money amount of monthly from  t_ad_coincharge_finance
     * Prarmeter : no
     * return : view 'admin.salesChart.monthlySale' ; 
     * */
    public function monthlyChart()
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
        return  view('admin.salesChart.monthlySale', ['order' => $order , 'coin' => $coin, 'orderArray' => $orderArray, 'coinArray' => $coinArray, ]) ; 
    }
  /*
     * Create : Cherry(12/1/2022)
     * Update :Cherry(14/1/2022)
     * Explain of function : For getting total order amount  of yearly from t_ad_order and 
     *                         total money amount of yearly from  t_ad_coincharge_finance
     * Prarmeter : no
     * return : view 'admin.salesChart.yearlySale' ; 
     * */
    public function yearlyChart()
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

        $coinYearly = [];
        foreach($coin as $key => $value){
            array_push($coinYearly, $value->year);
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

        $orderYearly = [];
        foreach($coin as $key => $value){
            array_push($orderYearly, $value->year);
        };
        return  view('admin.salesChart.yearlySale', ['order' => $order , 'coin' => $coin, 'orderArray' => $orderArray, 'coinArray' => $coinArray, 'coinYearly' => $coinYearly ,'orderYearly' => $orderYearly]) ; 
    }
     /*
     * Create : Cherry(14/1/2022)
     * Update :
     * Explain of function : For showing data charts between start date and end date
     * Prarmeter : no
     * return : 
     * */
    public function rangeChart(RangeChart $request)
    {   
        $validated = $request->validated();
        $fromDate = $validated['fromDate'];
        $toDate = $validated['toDate'];

        $coin= CoinChargeFinance::select(
            DB::raw('date(created_at) as date '),
            DB::raw('sum(amount) as totalAmount'),
        )
        ->where(DB::raw('date(created_at)'), '>=',$fromDate)
        ->where(DB::raw('date(created_at)'), '<=',$toDate)
        ->orderBy(DB::raw('created_at'), 'ASC')
        ->groupBy('date')
        ->get();

        $coinDaily = [];
        foreach($coin as $key => $value){
            array_push($coinDaily, $value->date);
        };  
        $coinArray = [];
        foreach($coin as $key => $value){
            array_push($coinArray, $value->totalAmount);
        };

        $order= OrderTransactionCheck::select(
            DB::raw('order_date as date'),
            DB::raw('count(id) as totalorder'),
        )
        ->where(DB::raw('order_date'),'>=',$fromDate)
        ->where(DB::raw('order_date'), '<=',$toDate)
        ->orderBy(DB::raw('order_date'), 'ASC')
        ->groupBy('date')
        ->get();

        $orderDaily = [];
        foreach($order as $key => $value){
            array_push($orderDaily, $value->date);
        };  

        $orderArray = [];
        foreach($order as $key => $value){
            array_push($orderArray, $value->totalorder);
        };    
        return  view('admin.salesChart.rangeSale', ['order' => $order , 'coin' => $coin, 'orderArray' => $orderArray, 'coinArray' => $coinArray, 'orderDaily'=> $orderDaily, 'coinDaily'=> $coinDaily]) ; 
    }
}
