<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderTransactionController extends Controller
{
    public function orderTransaction(){
        $transactiion = DB::table('t_ad_order');

        return view('admin.transactions.orderTransaction',['t_ad_order'=>$transactiion]);
    }
}
