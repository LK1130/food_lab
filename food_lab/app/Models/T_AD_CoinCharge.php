<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class T_AD_CoinCharge extends Model
{
    public  $table ='t_ad_coincharge';
    use HasFactory;
   /* Create:Zarni(2022/01/16) 
    * Update: 
    * This is function is to show the data of admin CoinChargeList
    * Return 
    */
    public function coinchargeLists(){

      Log::channel('adminlog')->info("T_AD_CoinCharge Model", [
        'Start coinchargeLists'
      ]);

        $coinchargelist =T_AD_CoinCharge::
        join('m_ad_login','m_ad_login.id','=','t_ad_coincharge.decision_by')
        ->join('m_decision_status','m_decision_status.id','=','t_ad_coincharge.decision_status')
        ->join('t_cu_customer','t_cu_customer.id','=','t_ad_coincharge.customer_id')
        ->where('t_ad_coincharge.del_flg',0)
        ->orderby('t_ad_coincharge.request_datetime','DESC')
        ->paginate(10);

        Log::channel('adminlog')->info("T_AD_CoinCharge Model", [
        'End coinchargeLists'
      ]);

        return $coinchargelist;
    }
   /* Create:Zarni(2022/01/16) 
    * Update: 
    * This is function is to show the data of admin DashboardminiCoinchargeList
    * Return 
    */
    public function Dashboardminicoin(){

      Log::channel('adminlog')->info("T_AD_CoinCharge Model", [
        'Start Dashboardminicoin'
      ]);

        $dashboardcoin = T_AD_CoinCharge::
        join('m_ad_login','m_ad_login.id','=','t_ad_coincharge.decision_by')
        ->join('m_decision_status','m_decision_status.id','=','t_ad_coincharge.decision_status')
        ->join('t_cu_customer','t_cu_customer.id','=','t_ad_coincharge.customer_id')
        ->where('t_ad_coincharge.del_flg',0)
        ->orderby('t_ad_coincharge.request_datetime','DESC')
        ->limit(5)
        ->get();

        Log::channel('adminlog')->info("T_AD_CoinCharge Model", [
          'End Dashboardminicoin'
        ]);

        return $dashboardcoin;
    }

      public function UsercoinchargeList($id){

        $usercoin = T_AD_CoinCharge::
        join('m_ad_login','m_ad_login.id','=','t_ad_coincharge.decision_by')
        ->join('m_decision_status','m_decision_status.id','=','t_ad_coincharge.decision_status')
        ->join('t_cu_customer','t_cu_customer.id','=','t_ad_coincharge.customer_id')
        ->where('t_ad_coincharge.del_flg',0)
        ->where('t_ad_coincharge.customer_id','=',$id)
        ->paginate(10);
        
        return $usercoin;
      }
  /*
    * Create : linn(2022/01/16) 
    * Update : 
    * This function is use to show coin listing.
    * Parameters : no
    * Return : all data
    */
  public function listing($status, $category)
  {
    Log::channel('adminlog')->info("T_AD_CoinCharge Model", [
      'Start listing'
    ]);

    $result =  T_AD_CoinCharge::where('decision_status', $status)
      ->join('t_cu_customer', 't_cu_customer.id', '=', 't_ad_coincharge.customer_id')
      ->join('m_ad_login', 'm_ad_login.id', '=', 't_ad_coincharge.decision_by')
      ->where('t_ad_coincharge.del_flg', 0)
      ->orderby('request_datetime', 'desc')
      ->paginate(10, ['*'], $category);

    Log::channel('adminlog')->info("T_AD_CoinCharge Model", [
      'End listing'
    ]);

    return $result;
  }
}
