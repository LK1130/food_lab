<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
