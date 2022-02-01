<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\T_AD_Order;
use App\Models\T_CU_Customer;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class DeliveryInfoController extends Controller
{   /*
    * Create:cherry(2022/01/30 
    * Update: 
    * This is function is to show Delivery Information
    * Return is view (customerDeliveryInfo.blade.php)
    */
    public function deliveryInfo(Request $request)
    {
        Log::channel('customerlog')->info('DeliveryInfoController ', [
            'start deliveryInfo'
        ]);
        
        $userID=session('customerId');

        $deliTownshipInfo = new T_CU_Customer();
        $deliInfo = $deliTownshipInfo->deliTownship($userID);

        if ($deliInfo === null) {
            Log::channel('adminlog')->info("T_CU_Customer Model", [
              'End deliTownship'
            ]);
            return redirect('error/404');
          } 
            
        Log::channel('customerlog')->info('DeliveryInfoController ', [
            'End deliveryInfo'
        ]);

        return View('customer.deliveryInfo',['deliInfo'=>$deliInfo]);
    }
}
