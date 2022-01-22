<?php

namespace App\Http\Controllers;

use App\Common\Variable;
use App\Http\Controllers\Controller;


use App\Models\M_AD_CoinRate;
use App\Models\M_Payment;
use App\Models\T_AD_CoinCharge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CoinController extends Controller
{

    /*
    * Create : linn(2022/01/16) 
    * Update : 
    * This function is use to show coin listing.
    * Parameters : no
    * Return : view('admin.coin.list')
    */
    public function list()
    {
        $commonVar = new Variable();
        Log::channel('adminlog')->info("CoinController", [
            'Start list'
        ]);
        $t_ad_coincharge = new T_AD_CoinCharge();
        // Request
        $request = $t_ad_coincharge->listing($commonVar->REQUEST, 'request');
        // Approve
        $approve = $t_ad_coincharge->listing($commonVar->APPROVE, 'approve');
        // Waiting
        $waiting = $t_ad_coincharge->listing($commonVar->WAITING, 'waiting');
        // Reject
        $reject = $t_ad_coincharge->listing($commonVar->REJECT, 'reject');

        Log::channel('adminlog')->info("CoinController", [
            'End list'
        ]);
        // Return to view
        return view('admin.coin.list', ['request' => $request, 'approve' => $approve, 'waiting' => $waiting, 'reject' => $reject]);
    }

    /*
    * Create : linn(2022/01/17) 
    * Update : 
    * This function is use to show coin change history.
    * Parameters : no
    * Return : view('admin.coin.rateHistory')
    */
    public function rateHistory()
    {
        Log::channel('adminlog')->info("CoinController", [
            'Start rateHistory'
        ]);
        $commonVar = new Variable();
        $admin = new M_AD_CoinRate();
        $admins = $admin->coinHistory();

        Log::channel('adminlog')->info("CoinController", [
            'End rateHistory'
        ]);

        return view('admin.coin.rateHistory', ['admins' => $admins]);
    }

    /*
    * Create : linn(2022/01/17) 
    * Update : 
    * This function is use to show coin change history.
    * Parameters : no
    * Return : view('admin.coin.rateChange')
    */
    public function rateChange()
    {
        Log::channel('adminlog')->info("CoinController", [
            'Start rateChange'
        ]);

        Log::channel('adminlog')->info("CoinController", [
            'End rateChange'
        ]);

        return view('admin.coin.rateChange');
    }

    /*
    * Create : linn(2022/01/17) 
    * Update : 
    * This function is use to show coin change history.
    * Parameters : no
    * Return : view('admin.coin.rateHistory')
    */
    public function rateStore(Request $request)
    {
        Log::channel('adminlog')->info("CoinController", [
            'Start rateStore'
        ]);

        $request->validate([
            'kyat' => 'required|min:0|max:100000|numeric',
            'note' => 'required|min:10|max:255'
        ]);
        $admin = new M_AD_CoinRate();
        $admin->coinRateChange($request);

        Log::channel('adminlog')->info("CoinController", [
            'End rateStore'
        ]);

        return redirect('rateHistory');
    }

    /*
    * Create : linn(2022/01/17) 
    * Update : 
    * This function is use to show coin change history.
    * Parameters : no
    * Return : view('admin.coin.rateHistory')
    */
    public function decision($id)
    {
        Log::channel('adminlog')->info("CoinController", [
            'Start decision'
        ]);

        $m_payment = new M_Payment();
        $paymentList = $m_payment->getPayment();

        $t_ad_coincharge = new T_AD_CoinCharge();
        $chargeDetail = $t_ad_coincharge->charageDetail($id);
        if ($chargeDetail == null) abort(404);

        Log::channel('adminlog')->info("CoinController", [
            'End decision'
        ]);

        return view('admin.coin.decision', ['Cdetail' => $chargeDetail, 'paymentlist' => $paymentList]);
    }


    /*
    * Create:zayar(2022/01/12) 
    * Update: 
    * This is function is use to show coin rate changed history.
    */
    public function index()
    {
        $admin = new M_AD_CoinRate();
        $admins = $admin->coinHistory();
        return view('admin.setting.coinRate.coinRate', ['admins' => $admins]);
    }

    /*
    * Create:zayar(2022/01/12) 
    * Update: 
    * This is function is used to show the coin rate change view.
    */
    public function create()
    {
        return view('admin.setting.coinRate.coinRateChange');
    }

    /*
    * Create:zayar(2022/01/12) 
    * Update: 
    * This is function is used to save coin rate change history in database.
    * $request is user input values.
    */
    public function store(Request $request)
    {
        $request->validate([
            'kyat' => 'required|min:0|max:100000|numeric',
            'note' => 'required|min:10|max:255'
        ]);
        $admin = new M_AD_CoinRate();
        $admin->coinRateChange($request);
        return redirect('coinrate');
    }
}
