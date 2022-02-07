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

        $userID = session('customerId');

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

        return View('customer.deliveryInfo', ['deliInfo' => $deliInfo, 'grandCoin' => session('grandCoin'), 'grandCash' => session('grandCash')]);
    }

    /* Create:cherry(1/2/2022)
    * Update: Min Khant(1/2/2022)
    * This is function is to show Delivery Information
    * Return is view (customerDeliveryInfo.blade.php)
    */
    public function order()
    {
        Log::channel('customerlog')->info('DeliveryInfoController', [
            'start order'
        ]);
        $vouncher = $_POST['vouncher'];
        $phone = $_POST['phone'];

        $userID = session('customerId');

        $productArrays = session('cart');
        $deliTownshipInfo = new T_CU_Customer();
        $deliInfo = $deliTownshipInfo->deliveryTownship($userID);
        $township = $deliInfo['address2'];

        if ($vouncher == 0) {
            $grandCoin = session('grandCoin');
            $grandCash = 0;
            for ($i = 0; $i < count($productArrays); $i++) {
                $productArrays[$i]['cash'] = 0;
            }
        } else {
            $grandCoin = 0;
            $grandCash = session('grandCash');
            for ($i = 0; $i < count($productArrays); $i++) {
                $productArrays[$i]['coin'] = 0;
            }
        }

        $tAdOrder = new T_AD_Order();
        $customerOrder = $tAdOrder->customerOrder($userID, $township, $productArrays, $grandCoin, $grandCash, $phone);
        session()->forget(['cart', 'grandCoin', 'grandCash']);

        Log::channel('customerlog')->info('DeliveryInfoController', [
            'start order'
        ]);
    }
}
