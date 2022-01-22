<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\T_AD_Order;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
            /*
    * Create:Zarni(2022/01/12) 
    * Update: 
    * This is function is to show admin ordertransactionDetail
    * Return is view (ordertransactionDetail.php)
    */
    public function ordertransactionDetail(Request $request){
        $ordertable = new T_AD_Order();
        $order = $ordertable->ordertransactionDetails($request->input('id'));

        if($order == null)
        {
            abort(404);
        }
        return view('admin.transactions.ordertransactionDetail',['order'=>$order]);
    }
}
