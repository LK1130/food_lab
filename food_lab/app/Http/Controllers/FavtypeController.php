<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\FavouriteValidation;
use App\Models\FavTypeModel;
use App\Models\M_AD_Track;
use Illuminate\Http\Request;

class FavtypeController extends Controller
{
    /*
    * Create:zayar(2022/01/15) 
    * Update: 
    * This function is used to show Favourite Type add view.
    */

    public function create()
    {
        return view('admin.setting.appManage.favTypeAdd');
    }
    /*
    * Create:zayar(2022/01/15) 
    * Update: 
    * This function is used to store Favourite Type.
    */

    public function store(FavouriteValidation $request)
    {
        $validate = $request->validated();
        $admin = new M_AD_Track();
        $admin->favTypeAdd($validate);
        return redirect('siteManage');
    }
    /*
    * Create:zayar(2022/01/15) 
    * Update: 
    * This function is used to show Favourite Type edit view.
    */

    public function show($id)
    {
        $admin = new M_AD_Track();
        $admins = $admin->favTypeEditView($id);
        return view('admin.setting.appManage.favTypeEdit', ['fav' => $admins]);
    }
    /*
    * Create:zayar(2022/01/15) 
    * Update: 
    * This function is used to update Favourite Type.
    */

    public function update(FavouriteValidation $request, $id)
    {
        $validate = $request->validated();
        $admin = new M_AD_Track();
        $admin->favTypeEdit($validate, $id);
        return redirect('siteManage');
    }
    /*
    * Create:zayar(2022/01/15) 
    * Update: 
    * This function is used to update del_flg to 1.
    */
    public function destroy($id)
    {
        $admin = new M_AD_Track();
        $admin->favTypeDelete($id);
        return redirect('siteManage');
    }
}
