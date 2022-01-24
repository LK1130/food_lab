<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_AD_News extends Model
{
    public $table = 'm_ad_news';
    use HasFactory;
    /*
    * Create:zayar(2022/01/15) 
    * Update: 
    * This function is used to show news add view.
    */

    public function newsAddView()
    {
        return M_News_Category::where('del_flg', '=', 0)->get();
    }
    /*
   * Create:zayar(2022/01/15) 
   * Update: 
   * This function is used to store news.
   */

    public function newsAdd($request, $siteLogo)
    {
        $admin = new M_AD_News();
        $admin->title = $request->input('title');
        $admin->source = $siteLogo;
        $admin->detail = $request->input('detail');
        $admin->category = $request->input('category');
        $admin->write_by = 1; //need to change
        $admin->save();
    }
    /*
   * Create:zayar(2022/01/15) 
   * Update: 
   * This function is used to show news edit view.
   */

    public function newsEditView($id)
    {
        return  M_AD_News::where('m_ad_news.id', $id)
            ->where('m_ad_news.del_flg', 0)
            ->join('m_news_category', 'm_news_category.id', '=', 'm_ad_news.category')
            ->get();
    }

    /*
   * Create:zayar(2022/01/15) 
   * Update: 
   * This function is used to update news.
   */

    public function newsEdit($request, $id)
    {
        $admin = M_AD_News::find($id);
        $admin->title = $request->input('title');
        $admin->detail = $request->input('detail');
        $admin->category = $request->input('category');
        $admin->write_by = 1; //need to change
        $admin->save();
    }
    /*
   * Create:zayar(2022/01/15) 
   * Update: 
   * This function is used to update del_flg to 1.
   */
    public function newsDelete($id)
    {
        $admin = M_AD_News::find($id);
        $admin->del_flg = 1;
        $admin->save();
    }

    use HasFactory;

    /*
     * Create : Min Khant(13/1/2022)
     * Update :
     * Explain of function : To show important news for users
     * Prarameter : no
     * return : news
     * */
    public function news()
    {
        return M_AD_News::where('del_flg', '=', '0')
            ->get();
    }

    /*
     * Create : zayar(24/1/2022)
     * Update :
     * Explain of function : To show  news for users in inform alert box
     * Prarameter : no
     * return : news
     * */
    public function newsLimited()
    {
        return M_AD_News::where('m_ad_news.del_flg', 0)
            ->join('m_news_category', 'm_news_category.id', '=', 'm_ad_news.category')
            ->limit(3)
            ->get();
    }
}
