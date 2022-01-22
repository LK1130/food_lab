<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class T_AD_OrderDetail extends Model
{
    public $table = 't_ad_orderdetail';
    use HasFactory;
    
    public function orderDetail($id){

        $orderDetail = T_AD_OrderDetail::
        where('t_ad_orderdetail.order_id','=',$id)
        ->join('m_product','m_product.id','=','t_ad_orderdetail.product_id')
        ->where('t_ad_orderdetail.del_flg',0)
        ->paginate(7);
        return $orderDetail;
    }
}
