<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminCoinRate extends Model
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
        return AdminCoinRateHistory::where('del_flg', '=', 0)->paginate(3);
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

        $oldrate = AdminCoinRate::select(['rate'])->where('del_flg', '=', 0)->orderBy('id', 'desc')->first();
        if ($oldrate === null) {
            $oldrate = 1000;
            $history = new AdminCoinRateHistory();
            $history->old_rate = $oldrate;
            $history->new_rate = $request->input('kyat');
            $history->change_by = 1; //need to change
            $history->change_note = $request->input('note');
            $history->save();
            $admin = new AdminCoinRate();
            $admin->rate = $request->input('kyat');
            $admin->save();
        } else {
            $history = new AdminCoinRateHistory();
            $history->old_rate = $oldrate->rate;
            $history->new_rate = $request->input('kyat');
            $history->change_by = 1; //need to change
            $history->change_note = $request->input('note');
            $history->save();
            $admin = AdminCoinRate::where('del_flg', '=', 0)->orderBy('id', 'desc')->first();
            $admin->rate = $request->input('kyat');
            $admin->save();
        }
    }
}
