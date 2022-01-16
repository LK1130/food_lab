<?php

namespace App\Http\Controllers;

use App\Common\Variable;
use App\Http\Controllers\Controller;
use App\Models\AdminCoinRate;
use App\Models\T_AD_CoinCharge;
use Illuminate\Http\Request;

class CoinController extends Controller
{

    /*
    * Create : linn(2022/01/16) 
    * Update : 
    * This function is use to show coin listing.
    * Parameters : no
    * Return : view('admin.coin.list')
    */
    public function list(){
        $commonVar = new Variable();
        $t_ad_coincharge = new T_AD_CoinCharge();
        // Request
        $request= $t_ad_coincharge->listing($commonVar->REQUEST,'request');
        // Approve
        $approve = $t_ad_coincharge->listing($commonVar->APPROVE, 'approve');
        // Waiting
        $waiting = $t_ad_coincharge->listing($commonVar->WAITING,'waiting');
        // Reject
        $reject = $t_ad_coincharge->listing($commonVar->REJECT,'reject');
        // Return to view
        return view('admin.coin.list',['request'=> $request, 'approve' => $approve, 'waiting' => $waiting, 'reject' => $reject] );
    }


    /*
    * Create:zayar(2022/01/12) 
    * Update: 
    * This is function is use to show coin rate changed history.
    */
    public function index()
    {
        $admin = new AdminCoinRate();
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
        $admin = new AdminCoinRate();
        $admin->coinRateChange($request);
        return redirect('coinrate');
    }
}
