<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsModel extends Model
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
        return CategoryModel::where('del_flg', '=', 0)->get();
    }
    /*
    * Create:zayar(2022/01/15) 
    * Update: 
    * This function is used to store news.
    */

    public function newsAdd($request, $siteLogo)
    {
        $admin = new NewsModel();
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
        return  NewsModel::find($id);
    }

    /*
    * Create:zayar(2022/01/15) 
    * Update: 
    * This function is used to update news.
    */

    public function newsEdit($request, $id)
    {
        $admin = NewsModel::find($id);
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
        $admin = NewsModel::find($id);
        $admin->del_flg = 1;
        $admin->save();
    }
}
