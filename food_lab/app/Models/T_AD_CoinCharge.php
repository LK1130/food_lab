<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class T_AD_CoinCharge extends Model
{
  public $table = 't_ad_coincharge';
  use HasFactory;

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
