<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class M_Product extends Model
{
    use HasFactory;
    public $table = 'm_product';

      /*
    * Create : Aung Min Khant(18/1/2022)
    * Update :
    * Explain of function : To save data for m_product databse 
    * parament : request from product add form
    * return save data
    * */


    public function saveData($request){

        Log::channel('adminlog')->info("M_Product_ Model", [
            'Start save Data'
        ]);

        $mrate = new M_AD_CoinRate();
       $rates = $mrate->getRate();
        $amount = $request->input('coin') * $rates->rate;
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


        Log::channel('adminlog')->info("M_Product Model", [
            'End save data'
        ]);
        return $product;
    }

       /*
    * Create : Aung Min Khant(20/1/2022)
    * Update :
    * Explain of function : To get  data with specific id from m_product databse 
    * parament : specific id from  product list table
    * return get data
    * */
    public function getDataById($id){

        Log::channel('adminlog')->info("M_Product_ Model", [
            'Start get Data'
        ]);
        $mProduct = M_Product::findOrfail($id);

        Log::channel('adminlog')->info("M_Product_ Model", [
            'End get Data'
        ]);
        return $mProduct;
    }
      /*
    * Create : Aung Min Khant(19/1/2022)
    * Update :
    * Explain of function : To update data for m_product databse 
    * parament : request from product edit form
    * return update data
    * */
  
    public function updateData($request,$id){
        Log::channel('adminlog')->info("M_Product_ Model", [
            'Start update Data'
        ]);

        $mrate = new M_AD_CoinRate();
        $rates = $mrate->getRate();
         $amount = $request->input('coin') * $rates->rate;
         $product = M_Product::find($id);
         $product->product_name = $request->input('pname');
         $product->product_type = $request->input('ptype');
         $product->product_taste = $request->input('ptaste');
         $product->coin = $request->input('coin');
         $product->amount = $amount;
         $product->list = $request->input('list');
         $product->description = $request->input('pdesc');
         $product->avaliable = $request->has('avaliable') ? 1 : 0;
         $product->save();

         Log::channel('adminlog')->info("M_Product_ Model", [
            'End update Data'
        ]);

        // dd($product);
        return $product;
    }
    public function productDetail(){

        return $this->hasMany('App\Models\M_Product_Detail');
    }
}
