<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class customerInfoController extends Controller
{
            /*
    * Create:Zarni(2022/01/12) 
    * Update: 
    * This is function is to show admin dashboard Listing
    * Return is view (dashboard.blade.php)
    */
    public function customerInfo(){
        $customer = DB::table('t_cu_customer')
        ->paginate(10);
        return view('admin.customerInfo.customerInfo',['t_cu_customer'=>$customer]);
    }
    public function customerinfoDetail(){
        return view('admin.customerInfo.customerinfoDetail');
    }
}
