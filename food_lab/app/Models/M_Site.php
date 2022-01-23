<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class M_Site extends Model
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
        $siteinfo = M_Site::where('del_flg', '=', 0)->orderBy('id', 'desc')->first();
        if ($siteinfo === null) {
            return null;
        } else {
            return $siteinfo;
        }
    }
    /*
   * Create:zayar(2022/01/13) 
   * Update: 
   * This function is used to get township datas.
   */
    public function township()
    {
        return M_Township::where('del_flg', '=', 0)->get();
    }
    /*
   * Create:zayar(2022/01/13) 
   * Update: 
   * This function is used to get payments datas.
   */
    public function payments()
    {
        return M_Payment::where('del_flg', '=', 0)->get();
    }
    /*
   * Create:zayar(2022/01/13) 
   * Update: 
   * This function is used to get categories datas.
   */
    public function categories()
    {
        return M_News_Category::where('del_flg', '=', 0)->get();
    }
    /*
   * Create:zayar(2022/01/13) 
   * Update: 
   * This function is used to get tastes datas.
   */
    public function tastes()
    {
        return M_Taste::where('del_flg', '=', 0)->get();
    }
    /*
   * Create:zayar(2022/01/13) 
   * Update: 
   * This function is used to get suggests datas.
   */
    public function suggests()
    {
        return T_AD_Suggest::where('del_flg', '=', 0)->get();
    }
    /*
   * Create:zayar(2022/01/13) 
   * Update: 
   * This function is used to get favtypes datas.
   */
    public function favtypes()
    {
        return M_Fav_Type::where('del_flg', '=', 0)->get();
    }
    /*
   * Create:zayar(2022/01/13) 
   * Update: 
   * This function is used to get orderStatus datas.
   */
    public function orderStatus()
    {
        return M_Order_Status::where('del_flg', '=', 0)->get();
    }
    /*
   * Create:zayar(2022/01/13) 
   * Update: 
   * This function is used to get desicions datas.
   */
    public function desicions()
    {
        return M_Decison_Status::where('del_flg', '=', 0)->get();
    }
    /*
   * Create:zayar(2022/01/13) 
   * Update: 
   * This function is used to get news datas.
   */
    public function news()
    {
        return M_AD_News::where('m_ad_news.del_flg', 0)
            ->join('m_news_category', 'm_news_category.id', '=', 'm_ad_news.category')
            ->paginate(3);
    }

    /*
   * Create:zayar(2022/01/13) 
   * Update: 
   * This function is used to update site datas.
   */
    public function saveSiteUpdate($request, $siteLogo)
    {
        $siteFirst = M_Site::where('del_flg', '=', 0)->orderBy('id', 'desc')->first();
        if ($siteFirst === null) {
            $site = new M_Site();
            $site->site_name = $request->input('name');
            $site->site_logo = $siteLogo;
            $site->privacy_policy = $request->input('policy');
            $site->maintenance = $request->input('maintenance');
            $site->save();
        } else {
            $siteFirst->site_name = $request->input('name');
            $siteFirst->site_logo = $siteLogo;
            $siteFirst->privacy_policy = $request->input('policy');
            $siteFirst->maintenance = $request->input('maintenance');
            $siteFirst->save();
        }
    }

    /*
     * Create : Min Khant(23/1/2022)
     * Update :
     * Explain of function : to get site name
     * Prarameter : no
     * return : site name
     * */
    public function siteName()
    {
        Log::channel('customerlog')->info('M_Site Model', [
            'start siteName'
        ]);
        $name = M_Site::select('site_name')
            ->where('del_flg', '=', 0)
            ->orderBy('id', 'desc')
            ->first();

        Log::channel('customerlog')->info('M_Site Model', [
            'end siteName'
        ]);
        return $name;
    }
}
