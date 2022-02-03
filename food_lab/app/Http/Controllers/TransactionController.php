<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\T_AD_Order;
use App\Models\T_AD_OrderDetail;
use App\Models\T_CU_Customer;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
            /*
    * Create:Zarni(2022/01/12) 
    * Update: 
    * This is function is to show admin ordertransactionDetail
    * Parameters : $request = transaction ID.
    * Return is view (ordertransactionDetail.php)
    */
    public function ordertransactionDetail(Request $request){
        $ordertable = new T_AD_Order();
        $order = $ordertable->ordertransactionDetails($request->input('id'));
        if($order == null)
        {
            abort(404);
        }

        $ordedetail = new T_AD_OrderDetail();
        $oDetail = $ordedetail->orderDetail($request->input('id'));

        return view('admin.transactions.ordertransactionDetail',['order'=>$order ,'orderdetail'=>$oDetail]);
    }

}
