<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\M_AD_CoinRate;
use Illuminate\Http\Request;

class CoinController extends Controller
{
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
