<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_Product_Detail extends Model
{
    use HasFactory;
    public $table = 'm_product_detail';

    public function insert($product,$category,$label,$order,$value){

        $product_detail = new M_Product_Detail();
        $product_detail->category = $category;
        $product_detail->label = $label;
        $product_detail->order = $order;
        $product_detail->value = $value;
        $product_detail->product_id = $product->id;
        $product_detail->save();
        //  $product->productDetail()->save($product_detail);
    }

    public function product(){
        
        return $this->belongsTo('App\Models\Product');
    }
}
