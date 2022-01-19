<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class M_Product_Detail extends Model
{
    use HasFactory;
    public $table = 'm_product_detail';

    /*
    * Create : Aung Min Khant(17/1/2022)
    * Update :
    * Explain of function : To insert data for m_product_detail base 
    * parameter : $request form product,category,label,order and value
    * return save data to database
    * */


    public function insert($product, $category, $label, $order, $value)
    {

        Log::channel('adminlog')->info("M_Product_Detail Model", [
            'Start Insert'
        ]);
        $product_detail = new M_Product_Detail();
        $product_detail->category = $category;
        $product_detail->label = $label;
        $product_detail->order = $order;
        $product_detail->value = $value;
        $product_detail->product_id = $product->id;
        $product_detail->save();

        Log::channel('adminlog')->info("M_Product_Detail Model", [
            'End Insert'
        ]);
    }

    /*
    * Create : Aung Min Khant(19/1/2022)
    * Update :
    * Explain of function : To update data for m_product_detail base 
    * parameter : $request form product,category,label,order and value
    * return update data to database
    * */

    public function updateData($id, $category, $label, $order, $value,)
    {
        Log::channel('adminlog')->info("M_Product_Detail Model", [
            'Start Update'
        ]);
        $product_detail = M_Product_Detail::where('m_product_detail.product_id','=',$id);
        // $product_detail = DB::table('m_product_detail')
                // ->where('m_product_detail.product_id',$id)
                // ->get();
        $product_detail->category = $category;
        $product_detail->label = $label;
        $product_detail->order = $order;
        $product_detail->value = $value;
        // $product_detail->product_id = $product->id;
        $product_detail->save();

        Log::channel('adminlog')->info("M_Product_Detail Model", [
            'End Update'
        ]);
        
    }
    public function product()
    {

        return $this->belongsTo('App\Models\Product');
    }
}
