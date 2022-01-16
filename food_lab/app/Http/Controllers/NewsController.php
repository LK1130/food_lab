<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\NewsModel;
use App\Models\SiteManage;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /*
    * Create:zayar(2022/01/15) 
    * Update: 
    * This function is used to show news add view.
    */

    public function create()
    {
        $app = new NewsModel();
        $admins = $app->newsAddView();
        return view('admin.setting.newsManage.newsAdd', ['categories' => $admins]);
    }
    /*
    * Create:zayar(2022/01/15) 
    * Update: 
    * This function is used to store news.
    */

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'detail' => 'required'
        ]);

        if ($request->hasFile('source')) {
            $file = $request->file('source');
            $file->storeAs('newsImage', $file->getClientOriginalName());
        } else {
            echo "File Not Received";
        }
        $logo = $request->file('source');
        $siteLogo = $logo->getClientOriginalName();
        $admin = new NewsModel();
        $admin->newsAdd($request, $siteLogo);
        return redirect('siteManage');
    }
    /*
    * Create:zayar(2022/01/15) 
    * Update: 
    * This function is used to show news  edit view.
    */

    public function show($id)
    {
        $admin = new NewsModel();
        $news = $admin->newsEditView($id);
        $site = new SiteManage();
        $categories =  $site->categories();
        return view('admin.setting.newsManage.newsEdit', ['news' => $news, 'categories' => $categories]);
    }
    /*
    * Create:zayar(2022/01/15) 
    * Update: 
    * This function is used to update news.
    */

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'detail' => 'required'
        ]);
        $admin = new NewsModel();
        $admin->newsEdit($request, $id);
        return redirect('siteManage');
    }
    /*
    * Create:zayar(2022/01/15) 
    * Update: 
    * This function is used to update del_flg to 1.
    */
    public function destroy($id)
    {
        $admin = new NewsModel();
        $admin->newsDelete($id);
        return redirect('siteManage');
    }
}
