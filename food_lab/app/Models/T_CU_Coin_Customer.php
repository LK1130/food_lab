<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class T_CU_Coin_Customer extends Model
{
    public $table = 't_cu_coin_customer';
    use HasFactory;

    /*
    * Create : linn(2022/01/16) 
    * Update : 
    * This function is use to set coin.
    * Parameters : customer_id and add coin amount
    * Return : no
    */
    public function setCoin($customer_id, $add_coin)
    {
        Log::channel('adminlog')->info("T_CU_Coin_Customer Model", [
            'Start setCoin'
        ]);

        $current_coin = T_CU_Coin_Customer::where('customer_id', $customer_id)
            ->where('del_flg', 0)
            ->first();

        if($current_coin == null) abort(500);


        T_CU_Coin_Customer::where('customer_id', $customer_id)
            ->update([
            'remain_coin' =>
            ($current_coin == null ? 0 : $current_coin->remain_coin) + $add_coin
            ]);
   
        Log::channel('adminlog')->info("T_AD_CoinCharge Model", [
            'End setCoin'
        ]);
    }

}
