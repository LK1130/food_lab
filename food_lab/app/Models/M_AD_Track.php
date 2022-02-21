<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
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
            ->select('*', DB::raw('m_ad_track.updated_at AS trackscreated'), DB::raw('m_ad_track.id AS tid'))
            ->orderBy('m_ad_track.updated_at', 'DESC')
            ->leftjoin('m_order_status', 'm_order_status.id', '=', 't_ad_order.order_status')
            ->leftjoin('t_ad_orderdetail', 't_ad_orderdetail.order_id', '=', 't_ad_order.id')
            ->leftjoin('m_product', 'm_product.id', '=', 't_ad_orderdetail.product_id')
            ->limit(3)
            ->get();

        // Log::channel('adminlog')->info("M_AD_Track Model", [
        //     $result->title;
        // ]);
        Log::channel('adminlog')->info("M_AD_Track Model", [
            'End trackLimited'
        ]);

        return $result;
    }
    /*
   * Create:zayar(2022/01/24) 
   * Update: 
   * This function is used to show tracks in tracks page.
   */
    public function allTracksToCount($sessionCustomerId)
    {
        Log::channel('adminlog')->info("M_AD_Track Model", [
            'Start allTracksToCount'
        ]);
        $result = T_AD_Order::select('*', DB::raw('t_ad_order.created_at AS trackscreated'))
            ->where('t_ad_order.customer_id', '=', $sessionCustomerId)
            ->where('t_ad_order.del_flg', 0)

            ->leftjoin('m_ad_track', 'm_ad_track.order_id', '=', 't_ad_order.id')
            ->where('m_ad_track.seen', 0)

            ->get();

        Log::channel('adminlog')->info("M_AD_Track Model", [
            'End allTracksToCount'
        ]);

        return $result;
    }
    public function allTracks($sessionCustomerId)
    {
        Log::channel('adminlog')->info("M_AD_Track Model", [
            'Start allTracks'
        ]);
        $result = T_AD_Order::where('t_ad_order.customer_id', '=', $sessionCustomerId)


            ->where('t_ad_order.del_flg', 0)
            ->leftjoin('m_ad_track', 'm_ad_track.order_id', '=', 't_ad_order.id')
            ->select('*', DB::raw('m_ad_track.updated_at AS trackscreated'), DB::raw('m_ad_track.id AS tid'))
            ->orderBy('m_ad_track.updated_at', 'DESC')
            ->leftjoin('m_order_status', 'm_order_status.id', '=', 't_ad_order.order_status')
            ->leftjoin('t_ad_orderdetail', 't_ad_orderdetail.order_id', '=', 't_ad_order.id')
            ->leftjoin('m_product', 'm_product.id', '=', 't_ad_orderdetail.product_id')
            ->paginate(10);


        Log::channel('adminlog')->info("M_AD_Track Model", [
            'End allTracks'
        ]);

        return $result;
    }
    /*
   * Create:zayar(2022/02/07) 
   * Update: 
   * This function is used to show tracks detail
   */

    public function searchTrack($id)
    {
        Log::channel('adminlog')->info("M_AD_Track Model", [
            'Start searchTrack'
        ]);
        $unseenTrack = M_AD_Track::where('order_id', $id)->first();


        $unseenTrack->seen = 1;
        $unseenTrack->save();


        $result = T_AD_Order::where('t_ad_order.id', '=', $id)
            ->where('t_ad_order.del_flg', 0)
            ->leftjoin('m_ad_track', 'm_ad_track.order_id', '=', 't_ad_order.id')
            ->select('*', DB::raw('m_ad_track.updated_at AS tracksupdated'))
            ->leftjoin('m_order_status', 'm_order_status.id', '=', 't_ad_order.order_status')
            ->leftjoin('t_ad_orderdetail', 't_ad_orderdetail.order_id', '=', 't_ad_order.id')
            ->leftjoin('m_product', 'm_product.id', '=', 't_ad_orderdetail.product_id')
            ->first();

        Log::channel('adminlog')->info("M_AD_Track Model", [
            'End searchTrack'
        ]);

        return $result;
    }
}
