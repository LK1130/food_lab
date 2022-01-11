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
    public function amountCheck()
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
        ->get()
        ->toArray();

        $order= OrderTransactionCheck::select(
            DB::raw('year(order_date) as year'),
            DB::raw('month(order_date) as month'),
            DB::raw('count(id) as totalorder'),
        )
        ->whereBetween( DB::raw('year(order_date)'),[$current-1,$current])
        ->groupBy('year')
        ->groupBy('month')
        ->get()
        ->toArray();

        return  view('admin.salesChart.monthlySale', compact('coin','order')) ;  
    }
   
}
