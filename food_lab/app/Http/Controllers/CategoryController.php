<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryValidation;
use App\Models\CategoryModel;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /*
    * Create:zayar(2022/01/15) 
    * Update: 
    * This function is used to show category add view.
    */

    public function create()
    {
        return view('admin.setting.appManage.categoryAdd');
    }
    /*
    * Create:zayar(2022/01/15) 
    * Update: 
    * This function is used to store category.
    */

    public function store(CategoryValidation $request)
    {
        $validate = $request->validated();
        $admin = new CategoryModel();
        $admin->categoryAdd($validate);
        return redirect('siteManage');
    }
    /*
    * Create:zayar(2022/01/15) 
    * Update: 
    * This function is used to show category edit view.
    */

    public function show($id)
    {
        $admin = new CategoryModel();
        $admins = $admin->categoryEditView($id);
        return view('admin.setting.appManage.categoryEdit', ['category' => $admins]);
    }
    /*
    * Create:zayar(2022/01/15) 
    * Update: 
    * This function is used to update category.
    */

    public function update(CategoryValidation $request, $id)
    {
        $validate = $request->validated();
        $admin = new CategoryModel();
        $admin->categoryEdit($validate, $id);
        return redirect('siteManage');
    }
    /*
    * Create:zayar(2022/01/15) 
    * Update: 
    * This function is used to update del_flg to 1.
    */
    public function destroy($id)
    {
        $admin = new CategoryModel();
        $admin->categoryDelete($id);
        return redirect('siteManage');
    }
}
