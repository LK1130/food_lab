<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_AD_CoinRate extends Model
{
    use HasFactory;
    /*
    * Create:zayar(2022/01/12) 
    * Update: 
    * This is method is used to save admin in database.
    * $validate is validated user request.
    * $admin is AdminLogin model.
    * $admins is all admin from database.
    * Return is view (adminList.blade.php).
    */
    public function coinHistory()
    {
        return T_AD_CoinRate_History::where('del_flg', '=', 0)->paginate(3);
    }
    /*
   * Create:zayar(2022/01/11) 
   * Update: 
   * This is method is used to save coin rate change history and coin rate in database.
   * $validate is validated user request.
   * $admin is AdminLogin model.
   * $admins is all admin from database.
   * Return is view (adminList.blade.php).
   */
    public function coinRateChange($request)
    {

        $oldrate = M_AD_CoinRate::select(['rate'])->where('del_flg', '=', 0)->orderBy('id', 'desc')->first();
        if ($oldrate === null) {
            $oldrate = 1000;
            $history = new T_AD_CoinRate_History();
            $history->old_rate = $oldrate;
            $history->new_rate = $request->input('kyat');
            $history->change_by = 1; //need to change
            $history->change_note = $request->input('note');
            $history->save();
            $admin = new M_AD_CoinRate();
            $admin->rate = $request->input('kyat');
            $admin->save();
        } else {
            $history = new T_AD_CoinRate_History();
            $history->old_rate = $oldrate->rate;
            $history->new_rate = $request->input('kyat');
            $history->change_by = 1; //need to change
            $history->change_note = $request->input('note');
            $history->save();
            $admin = M_AD_CoinRate::where('del_flg', '=', 0)->orderBy('id', 'desc')->first();
            $admin->rate = $request->input('kyat');
            $admin->save();
        }
    }
}
