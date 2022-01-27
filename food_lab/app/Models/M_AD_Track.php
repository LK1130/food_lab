<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class M_AD_Track extends Model
{
    public $table = 'm_ad_track';
    use HasFactory;
    /*
   * Create:zayar(2022/01/24) 
   * Update: 
   * This function is used to show limited tracks in inform alert.
   */

    public function trackLimited($sessionCustomerId)
    {
        Log::channel('adminlog')->info("M_AD_Track Model", [
            'Start trackLimited'
        ]);

        $result = T_AD_Order::where('t_ad_order.customer_id', '=', $sessionCustomerId)
            ->where('t_ad_order.del_flg', 0)
            ->leftjoin('m_ad_track', 'm_ad_track.order_id', '=', 't_ad_order.id')
            ->leftjoin('m_order_status', 'm_order_status.id', '=', 't_ad_order.order_status')
            ->leftjoin('t_ad_orderdetail', 't_ad_orderdetail.order_id', '=', 't_ad_order.id')
            ->leftjoin('m_product', 'm_product.id', '=', 't_ad_orderdetail.product_id')
            ->limit(3)
            ->get();

        Log::channel('adminlog')->info("M_AD_Track Model", [
            'End trackLimited'
        ]);

        return $result;
    }
}
