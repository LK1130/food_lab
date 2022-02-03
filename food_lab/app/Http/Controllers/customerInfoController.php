<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\T_AD_CoinCharge;
use App\Models\T_AD_Order;
use App\Models\T_CU_Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CustomerInfoController extends Controller
{
            /*
    * Create:Zarni(2022/01/12) 
    * Update: 
    * This is function is to show admin Customer Listing
    * Return is view (customerInfo.blade.php)
    */
    public function customerInfo(){
        $customer1 = new T_CU_Customer();
        $customer = $customer1->customerInfoList();
        return view('admin.customerInfo.customerInfo',['t_cu_customer'=>$customer]);
    }
            /*
    * Create:Zarni(2022/01/12) 
    * Update: 
    * This is function is to show Customer detail orderListing
    * Return is view (customerinfoDetail.blade.php)
    */
    public function customerinfoDetail(Request $request){
        $customerd =new T_CU_Customer();
        $cusdetail = $customerd->customerDetail($request->input('id'));
        if($cusdetail == null)abort(404);
        // Log::critical('asdasd',[$cusdetail,$request->input('id')]);
        $custrans = new T_AD_Order();
        $trans = $custrans->Usertransaction($request->input('id'));
        if($trans == null)abort(404);
        // return $trans;
        $coin = new T_AD_CoinCharge();
        $cuscoin = $coin->UsercoinchargeList($request->input('id'));
        
        return view('admin.customerInfo.customerinfoDetail',['cusdetail'=>$cusdetail,'t_ad_order'=>$trans,'cuscoin'=>$cuscoin]);
    }

    /*
      * Create : Zar Ni(20/1/2022)
      * Update :
      * Explain of function : To show customer name search
      * Prarameter : no
      * return :
    */
    public function customerSearch(Request $request){
        

        $cus = new T_CU_Customer();
        $namelist = $cus->cusSearch($request);
        return response()
        ->json(
        $namelist
        );

    }
    /*
      * Create : Zar Ni(20/1/2022)
      * Update :
      * Explain of function : To show customer id search
      * Prarameter : no
      * return :
    */
    public function customeridSearch(Request $request){

        $customerid = new T_CU_Customer();
        $searchid = $customerid->cusidSearch($request);
        return response()
        ->json(
        $searchid
        );
    }
    
}
