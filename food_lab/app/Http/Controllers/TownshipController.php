<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\TownshipValidation;
use App\Models\M_Township;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;

class TownshipController extends Controller
{
    /*
    * Create:zayar(2022/01/15) 
    * Update: 
    * This function is used to show township add view.
    */
    public function create()
    {
        return view('admin.setting.appManage.townshipAdd');
    }

    /*
    * Create:zayar(2022/01/15) 
    * Update: 
    * This function is used to store township.
    */
    public function store(TownshipValidation $request)
    {
        $validate = $request->validated();
        $admin = new M_Township();
        $admin->townshipAdd($validate);
        return redirect('siteManage');
    }

    /*
    * Create:zayar(2022/01/15) 
    * Update: 
    * This function is used to show township edit view.
    */
    public function show($id)
    {
        $admin = new M_Township();
        $admins = $admin->townshipEditView($id);
        return view('admin.setting.appManage.townshipEdit', ['township' => $admins]);
    }

    /*
    * Create:zayar(2022/01/15) 
    * Update: 
    * This function is used to update township.
    */
    public function update(TownshipValidation $request, $id)
    {
        $validate = $request->validated();
        $admin = new M_Township();
        $admin->townshipEdit($validate, $id);
        return redirect('siteManage');
    }

    /*
    * Create:zayar(2022/01/15) 
    * Update: 
    * This function is used to update del_flg to 1.
    */
    public function destroy($id)
    {
        $admin = new M_Township();
        $admin->townshipDelete($id);
        return redirect('siteManage');
    }
}
