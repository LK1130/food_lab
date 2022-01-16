<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\TasteValidation;
use App\Models\TasteModel;
use Illuminate\Http\Request;

class TasteController extends Controller
{
    /*
    * Create:zayar(2022/01/15) 
    * Update: 
    * This function is used to show taste add view.
    */

    public function create()
    {
        return view('admin.setting.appManage.tasteAdd');
    }
    /*
    * Create:zayar(2022/01/15) 
    * Update: 
    * This function is used to store taste.
    */

    public function store(TasteValidation $request)
    {
        $validate = $request->validated();
        $admin = new TasteModel();
        $admin->tasteAdd($validate);
        return redirect('siteManage');
    }
    /*
    * Create:zayar(2022/01/15) 
    * Update: 
    * This function is used to show taste edit view.
    */

    public function show($id)
    {
        $admin = new TasteModel();
        $admins = $admin->tasteEditView($id);
        return view('admin.setting.appManage.tasteEdit', ['taste' => $admins]);
    }
    /*
    * Create:zayar(2022/01/15) 
    * Update: 
    * This function is used to update taste.
    */

    public function update(TasteValidation $request, $id)
    {
        $validate = $request->validated();
        $admin = new TasteModel();
        $admin->tasteEdit($validate, $id);
        return redirect('siteManage');
    }
    /*
    * Create:zayar(2022/01/15) 
    * Update: 
    * This function is used to update del_flg to 1.
    */
    public function destroy($id)
    {
        $admin = new TasteModel();
        $admin->tasteDelete($id);
        return redirect('siteManage');
    }
}
