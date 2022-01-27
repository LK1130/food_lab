<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function orderList()
    {   
        $userID=Session::get('')
        $items = DB::table('m_product')
        ->join('t_ad_orderdetial','m_product.id','=','t_ad_orderdetail.produce_id')
        ->
    }
}
