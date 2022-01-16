<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteManage extends Model
{
    public $table = 'm_site';
    use HasFactory;
    /*
    * Create:zayar(2022/01/13) 
    * Update: 
    * This function is used to show site and app management view.
    */
    public function siteManage()
    {
        return SiteManage::first();
    }
    /*
    * Create:zayar(2022/01/13) 
    * Update: 
    * This function is used to get township datas.
    */
    public function township()
    {
        return TownshipModel::where('del_flg', '=', 0)->get();
    }
    /*
    * Create:zayar(2022/01/13) 
    * Update: 
    * This function is used to get payments datas.
    */
    public function payments()
    {
        return PaymentModel::where('del_flg', '=', 0)->get();
    }
    /*
    * Create:zayar(2022/01/13) 
    * Update: 
    * This function is used to get categories datas.
    */
    public function categories()
    {
        return CategoryModel::where('del_flg', '=', 0)->get();
    }
    /*
    * Create:zayar(2022/01/13) 
    * Update: 
    * This function is used to get tastes datas.
    */
    public function tastes()
    {
        return TasteModel::where('del_flg', '=', 0)->get();
    }
    /*
    * Create:zayar(2022/01/13) 
    * Update: 
    * This function is used to get suggests datas.
    */
    public function suggests()
    {
        return SuggestModel::where('del_flg', '=', 0)->get();
    }
    /*
    * Create:zayar(2022/01/13) 
    * Update: 
    * This function is used to get favtypes datas.
    */
    public function favtypes()
    {
        return FavTypeModel::where('del_flg', '=', 0)->get();
    }
    /*
    * Create:zayar(2022/01/13) 
    * Update: 
    * This function is used to get orderStatus datas.
    */
    public function orderStatus()
    {
        return OrderStatusModel::where('del_flg', '=', 0)->get();
    }
    /*
    * Create:zayar(2022/01/13) 
    * Update: 
    * This function is used to get desicions datas.
    */
    public function desicions()
    {
        return DecisionStatusModel::where('del_flg', '=', 0)->get();
    }
    /*
    * Create:zayar(2022/01/13) 
    * Update: 
    * This function is used to get news datas.
    */
    public function news()
    {
        return NewsModel::where('del_flg', '=', 0)->paginate(3);
    }

    /*
    * Create:zayar(2022/01/13) 
    * Update: 
    * This function is used to update site datas.
    */
    public function saveSiteUpdate($request, $siteLogo)
    {
        $site = SiteManage::find(1);
        $site->site_name = $request->input('name');
        $site->site_logo = $siteLogo;
        $site->privacy_policy = $request->input('policy');
        $site->maintenance = $request->input('maintenance');
        $site->save();
    }
}
