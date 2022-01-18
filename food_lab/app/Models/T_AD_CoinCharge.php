<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class T_AD_CoinCharge extends Model
{
    public  $table ='t_ad_coincharge';
    use HasFactory;
    public function coinchargeList()
    {
        return T_AD_CoinCharge::all();
    }

    public function coinchargeLists(){
        $coinchargelist =T_AD_CoinCharge::
        join('m_ad_login','m_ad_login.id','=','t_ad_coincharge.decision_by')
        ->join('m_decision_status','m_decision_status.id','=','t_ad_coincharge.decision_status')
        ->join('t_cu_customer','t_cu_customer.id','=','t_ad_coincharge.customer_id')
        ->where('t_ad_coincharge.del_flg',0)
        ->orderby('t_ad_coincharge.request_datetime','DESC')
        ->paginate(10);

        return $coinchargelist;
    }

    public function Dashboardminicoin(){
        $dashboardcoin = T_AD_CoinCharge::
        join('m_ad_login','m_ad_login.id','=','t_ad_coincharge.decision_by')
        ->join('m_decision_status','m_decision_status.id','=','t_ad_coincharge.decision_status')
        ->join('t_cu_customer','t_cu_customer.id','=','t_ad_coincharge.customer_id')
        ->where('t_ad_coincharge.del_flg',0)
        ->orderby('t_ad_coincharge.request_datetime','DESC')
        ->limit(5)
        ->get();

        return $dashboardcoin;
    }
}
