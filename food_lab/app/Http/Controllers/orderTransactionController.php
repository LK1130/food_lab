<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\OrderTransactionCheck;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderTransactionController extends Controller
{
            /*
    * Create:Zarni(2022/01/12) 
    * Update: 
    * This is function is to get data form database for ordertransaction
    * Return is view (customerInfo.blade.php)
    */
    public function orderTransaction(){
        $transaction = DB::table('t_ad_order')
        ->paginate(10);
        return view('admin.transactions.orderTransaction',['t_ad_order'=>$transaction]);
    }
}
