<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class T_AD_Evd extends Model
{
    use HasFactory;
    public $table = 't_ad_evd';


     /*
    * Create : Aung Min Khant(19/1/2022)
    * Update :
    * Explain of function : To save product image to t_av_evd database
    * parament : request from product add form
    * return save data
    * */

    public function insertImage($filepath,$product)
    {

        Log::channel('adminlog')->info("T_AD_EVD Model", [
            'Start save Data'
        ]);
        $evd = new T_AD_Evd();
        $evd->link_id = $product->id;
        $evd->path = $filepath;
        $evd->note = "Product Image";
        $evd->save();

        Log::channel('adminlog')->info("T_AD_EVD Model", [
            'End save Data'
        ]);
    }

    /*
    * Create : Aung Min Khant(19/1/2022)
    * Update :
    * Explain of function : To update product image to t_av_evd database
    * parament : request from product add form
    * return update data
    * */


    public function updateImage($id,$filepath){
        Log::channel('adminlog')->info("T_AD_EVD Model", [
            'Start update Data'
        ]);
        $evd = T_AD_Evd::where('t_ad_evd.link_id','=',$id)->get();
        $evd->path = $filepath;
        $evd->save();

        Log::channel('adminlog')->info("T_AD_EVD Model", [
            'End update Data'
        ]);
    }
}
