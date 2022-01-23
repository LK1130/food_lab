<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
}
