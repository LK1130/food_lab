<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class M_AD_CoinCharge_Message extends Model
{
    public $table = 'm_ad_coincharge_message';
    use HasFactory;
    /*
    * Create:zayar(2022/01/24) 
    * Update: 
    * This is method is used to show messages in inform alert.

    */
    public function informMessage($sessionCustomerId)
    {
        Log::channel('adminlog')->info("M_AD_CoinCharge_Message Model", [
            'Start informMessage'
        ]);

        $result = T_AD_CoinCharge::where('t_ad_coincharge.customer_id', '=', $sessionCustomerId)
            ->where('t_ad_coincharge.del_flg', 0)
            ->leftjoin('m_ad_coincharge_message', 'm_ad_coincharge_message.charge_id', '=', 't_ad_coincharge.id')
            ->leftjoin('m_decision_status', 'm_decision_status.id', '=', 't_ad_coincharge.decision_status')
            ->limit(3)
            ->get();

        Log::channel('adminlog')->info("M_AD_CoinRate Model", [
            'End informMessage'
        ]);

        return $result;
    }

    /*
    * Create:zayar(2022/01/26) 
    * Update: 
    * This is method is used to show messages in message page.

    */
    public function allMessage($sessionCustomerId)
    {
        Log::channel('adminlog')->info("M_AD_CoinCharge_Message Model", [
            'Start allMessage'
        ]);

        $result = T_AD_CoinCharge::where('t_ad_coincharge.customer_id', '=', $sessionCustomerId)
            ->where('t_ad_coincharge.del_flg', 0)
            ->leftjoin('m_ad_coincharge_message', 'm_ad_coincharge_message.charge_id', '=', 't_ad_coincharge.id')
            ->leftjoin('m_decision_status', 'm_decision_status.id', '=', 't_ad_coincharge.decision_status')
            ->get();

        Log::channel('adminlog')->info("M_AD_CoinRate Model", [
            'End allMessage'
        ]);

        return $result;
    }
}
