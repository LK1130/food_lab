<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\SuggestValidation;
use App\Models\SuggestModel;
use App\Models\T_AD_Suggest;
use Illuminate\Http\Request;

class SuggestController extends Controller
{
    /*
    * Create:zayar(2022/01/15) 
    * Update: 
    * This function is used to show suggest add view.
    */

    public function create()
    {
        return view('admin.setting.appManage.suggestAdd');
    }
    /*
    * Create:zayar(2022/01/15) 
    * Update: 
    * This function is used to store suggest.
    */

    public function store(SuggestValidation $request)
    {
        $validate = $request->validated();
        $admin = new T_AD_Suggest();
        $admin->suggestAdd($validate);
        return redirect('siteManage');
    }
    /*
    * Create:zayar(2022/01/15) 
    * Update: 
    * This function is used to show suggest edit view.
    */

    public function show($id)
    {
        $admin = new T_AD_Suggest();
        $admins = $admin->suggestEditView($id);
        return view('admin.setting.appManage.suggestEdit', ['suggest' => $admins]);
    }
    /*
    * Create:zayar(2022/01/15) 
    * Update: 
    * This function is used to update suggest.
    */

    public function update(SuggestValidation $request, $id)
    {
        $validate = $request->validated();
        $admin = new T_AD_Suggest();
        $admin->suggestEdit($validate, $id);
        return redirect('siteManage');
    }
    /*
    * Create:zayar(2022/01/15) 
    * Update: 
    * This function is used to update del_flg to 1.
    */
    public function destroy($id)
    {
        $admin = new T_AD_Suggest();
        $admin->suggestDelete($id);
        return redirect('siteManage');
    }
}
