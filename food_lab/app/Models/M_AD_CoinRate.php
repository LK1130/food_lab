<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class M_AD_CoinRate extends Model
{

    public $table = 'm_ad_coinrate';
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
        Log::channel('adminlog')->info("M_AD_CoinRate Model", [
            'Start coinHistory'
        ]);

        $result= T_AD_CoinRate_History::where('t_ad_coinrate_history.del_flg', '=', 0)
        ->join('m_ad_login', 'm_ad_login.id','=','t_ad_coinrate_history.change_by')
        ->paginate(3);

        Log::channel('adminlog')->info("M_AD_CoinRate Model", [
            'End coinHistory'
        ]);

        return $result;
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
        DB::transaction(function () use($request) {
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
                $admin->base = 1;
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
                $admin->base = 1;
                $admin->save();
            }
        });
    }
}
