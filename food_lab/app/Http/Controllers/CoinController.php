<?php

namespace App\Http\Controllers;

use App\Common\Variable;
use App\Http\Controllers\Controller;


use App\Models\M_AD_CoinRate;
use App\Models\M_Payment;
use App\Models\T_AD_CoinCharge;
use App\Models\T_AD_CoinCharge_Decision_History;
use App\Models\T_AD_CoinCharge_Finance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
    * Parameters : charge id
    * Return : view('admin.coin.rateHistory')
    */
    public function decision($id)
    {
        Log::channel('adminlog')->info("CoinController", [
            'Start decision'
        ]);
        // Get Coin Detail Info
        $t_ad_coincharge = new T_AD_CoinCharge();
        $chargeDetail = $t_ad_coincharge->chargeDetail($id);

        if ($chargeDetail == null) abort(404);

        // Get Payment List for Payment Select Box
        $m_payment = new M_Payment();
        $paymentList = $m_payment->getPayment();

        $path = $t_ad_coincharge->getChargePhoto($id);
        //if ($path == null) abort(500);

        $m_ad_coinrate = new M_AD_CoinRate();
        $rate = $m_ad_coinrate->getRate();

        Log::channel('adminlog')->info("CoinController", [
            'End decision'
        ]);

        return view('admin.coin.decision', [
            'Cdetail' => $chargeDetail, 
            'paymentlist' => $paymentList, 
            'path' => $path, 
            'rate' => $rate->rate]);
    }


    /*
    * Create : linn(2022/01/17) 
    * Update : 
    * This function is use to Approve Waiting Reject.
    * Parameters : no
    * Return : view('admin.coin.rateHistory')
    */
    public function makeDecision(Request $request)
    {
        Log::channel('adminlog')->info("CoinController", [
            'Start makeDecision'
        ]);

        $request->validate([
            'payment' => 'required',
            'amount' => 'required',
            'note' => 'required',
            'decision' => 'required',
            'chargeId' => 'required'
        ]);

        DB::transaction(
            function () use ($request) {
                // Record History
                $t_ad_coincharge = new T_AD_CoinCharge();
                $oldStatus = $t_ad_coincharge->findChargeById($request->chargeId);
                $t_ad_coincharge_decision_history = new T_AD_CoinCharge_Decision_History();
                $t_ad_coincharge_decision_history->setDecisionHistory(
                    $request->chargeId, $oldStatus->decision_status,$request->decision,$request->note);

                // Set Status
                $t_ad_coincharge = new T_AD_CoinCharge();
                $t_ad_coincharge->setChargeDecision($request->chargeId,$request->decision);

                // Add Finance
                $t_ad_Coincharage_finance = new T_AD_CoinCharge_Finance();
                $t_ad_Coincharage_finance->setChargeFinance($request->chargeId,
                $request->amount,$request->payment);
            });

        Log::channel('adminlog')->info("CoinController", [
            'End makeDecision'
        ]);

        return redirect('/coinListing');
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
