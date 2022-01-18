<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\FuncCall;

class T_AD_Order extends Model
{
    public $table = 't_ad_order';
    use HasFactory;
    public function orderTransaction()
    {
        return T_AD_Order::all();
    }
    /* Create:Zarni(2022/01/16) 
    * Update: 
    * This is function is to show the date of admin ordertransactionDetail
    * Return 
    */


    public function ordertransactionDetails($id){
        $ordertransactionDetail =T_AD_Order::
        select ('*',DB::raw('t_ad_order.id AS orderid'))
        ->join('t_cu_customer','t_cu_customer.id','=','t_ad_order.customer_id')
        ->join('m_ad_login','m_ad_login.id','=','t_ad_order.last_control_by')
        ->join('m_order_status','m_order_status.id','=','t_ad_order.order_status')
        ->where('t_ad_order.del_flg',0)
        ->where('t_ad_order.id','=',$id)
        ->first();

        return $ordertransactionDetail;
    }


        /* Create:Zarni(2022/01/16) 
    * Update: 
    * This is function is to show the date of admin ordertransactionList
    * Return 
    */
    public function OrderTransactions(){
        $ordertransactions=T_AD_Order::
        join('t_cu_customer','t_cu_customer.id','=','t_ad_order.customer_id')
        ->where('t_ad_order.del_flg',0)
        ->paginate(10);


        return $ordertransactions;
    }
    public function DashboardMinitrans(){
        $dashboardtrans = T_AD_Order::
        join('t_cu_customer','t_cu_customer.id','=','t_ad_order.customer_id')
        ->where('t_ad_order.del_flg',0)
        ->limit(5)
        ->get();

        return $dashboardtrans;
        }

        public function Dashboardtranscount(){
            $transcount = T_AD_Order::where('t_ad_order.del_flg',0)
            ->count('t_ad_order.id');

            return $transcount;
        }
}
