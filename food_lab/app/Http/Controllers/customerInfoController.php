<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerInfoController extends Controller
{
            /*
    * Create:Zarni(2022/01/12) 
    * Update: 
    * This is function is to show admin Customer Listing
    * Return is view (customerInfo.blade.php)
    */
    public function customerInfo(){
        $customer = DB::table('t_cu_customer')
        ->paginate(10);
        return view('admin.customerInfo.customerInfo',['t_cu_customer'=>$customer]);
    }
            /*
    * Create:Zarni(2022/01/12) 
    * Update: 
    * This is function is to show Customer detail orderListing
    * Return is view (customerinfoDetail.blade.php)
    */
    public function customerinfoDetail(){
        $transaction = DB::table('t_ad_order')
        ->paginate(5);
        return view('admin.customerInfo.customerinfoDetail',['t_ad_order'=>$transaction]);
    }
}
