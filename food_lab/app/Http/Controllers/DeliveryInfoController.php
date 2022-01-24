<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DeliveryInfoController extends Controller
{   /*
    * Create:cherry(2022/01/21) 
    * Update: 
    * This is function is to show Delivery Information
    * Return is view (customerDeliveryInfo.blade.php)
    */
    public function customerInfo(){
        $id=1;
        $customer = DB::table('t_cu_customer')
        ->where('id',$id)
        ->get();
        return view('customer.deliveryInfo',['customer'=>$customer]);
    }
}
