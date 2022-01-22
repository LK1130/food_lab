<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class M_Product extends Model
{
    use HasFactory;
    public $table = 'm_product';

    public function saveData($request){
        $amount = $request->input('coin') * 1000;
        
        $product = new M_Product();
        $product->product_name = $request->input('pname');
        $product->product_type = $request->input('ptype');
        $product->product_taste = $request->input('ptaste');
        $product->coin = $request->input('coin');
        $product->amount = $amount;
        $product->list = $request->input('list');
        $product->description = $request->input('pdesc');
        $product->avaliable = $request->has('avaliable') ? 1 : 0;
        $product->save();

        return $product;
    }
  
    public function productDetail(){

        return $this->hasMany('App\Models\M_Product_Detail');
    }

    /*
      * Create : Zar Ni(15/1/2022)
      * Update :
      * Explain of function : To get data for DashboardProductMiniList
      * Prarameter : no
      * return :
    */
    public function DashboardproductList(){
        
        Log::channel('adminlog')->info("M_Product Model", [
            'Start DashboardproductList'
        ]);

        $dashboardproduct = M_Product::
        join('m_taste','m_taste.id','=','m_product.product_taste')
        ->join('m_fav_type','m_fav_type.id','=','m_product.product_type')
        ->limit(5)
        ->get();

        Log::channel('adminlog')->info("M_Product Model", [
            'End DashboardproductList'
        ]);

        return $dashboardproduct;
    }
}
