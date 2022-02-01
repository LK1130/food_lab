<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class T_AD_OrderDetail extends Model
{
    public $table = 't_ad_orderdetail';
    use HasFactory;

    /*
    * Create : Min Khant(14/1/2022)
    * Update :
    * Explain of function : To get product data
    * Prarameter : no
    * return : 
    */
    public function productId($id)
    {
        Log::channel('customerlog')->info('T_AD_OrderDetail Model', [
            'start productId'
        ]);
        $productIds = T_AD_OrderDetail::select('product_id')
            ->where('order_id', '=', $id)
            ->where('del_flg', '=', 0)
            ->get();

        return $productIds;
    }

    public function orderDetail($id)
    {

        $orderDetail = T_AD_OrderDetail::where('t_ad_orderdetail.order_id', '=', $id)
            ->join('m_product', 'm_product.id', '=', 't_ad_orderdetail.product_id')
            ->where('t_ad_orderdetail.del_flg', 0)
            ->paginate(7);
        return $orderDetail;
    }

    /*
     * Create : Min Khant(31/1/2022)
     * Update : 
     * Explain of function : Get best sell product
     * Prarameter : no
     * return : product
     * */
    public function bestSellItems()
    {
        Log::channel('customerlog')->info('T_AD_OrderDetail Model', [
            'start bestSellItems'
        ]);

        $prodcuts = T_AD_OrderDetail::select('product_id', 'product_name', 'coin', 'amount', DB::raw('SUM(quantity) AS total'))
            ->join('m_product', 'm_product.id', '=', 't_ad_orderdetail.product_id')
            ->where('t_ad_orderdetail.del_flg', 0)
            ->where('m_product.del_flg', 0)
            ->groupBy('product_id')
            ->orderBy('total', 'DESC')
            ->limit(3)
            ->get();

        Log::channel('customerlog')->info('T_AD_OrderDetail Model', [
            'end bestSellItems'
        ]);
        return $prodcuts;
    }
}
