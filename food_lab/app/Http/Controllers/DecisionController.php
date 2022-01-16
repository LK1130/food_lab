<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\DecisionValidation;
use App\Models\DecisionStatusModel;
use Illuminate\Http\Request;

class DecisionController extends Controller
{
    /*
    * Create:zayar(2022/01/15) 
    * Update: 
    * This function is used to show Decision add view.
    */

    public function create()
    {
        return view('admin.setting.appManage.decisionStatusAdd');
    }
    /*
    * Create:zayar(2022/01/15) 
    * Update: 
    * This function is used to store Decision.
    */

    public function store(DecisionValidation $request)
    {
        $validate = $request->validated();
        $admin = new DecisionStatusModel();
        $admin->decisionStatusAdd($validate);
        return redirect('siteManage');
    }
    /*
    * Create:zayar(2022/01/15) 
    * Update: 
    * This function is used to show Decision edit view.
    */

    public function show($id)
    {
        $admin = new DecisionStatusModel();
        $admins =  $admin->decisionStatusEditView($id);
        return view('admin.setting.appManage.decisionStatusEdit', ['decision' => $admins]);
    }
    /*
    * Create:zayar(2022/01/15) 
    * Update: 
    * This function is used to update Decision.
    */

    public function update(DecisionValidation $request, $id)
    {
        $validate = $request->validated();
        $admin = new DecisionStatusModel();
        $admin->decisionStatusEdit($validate, $id);
        return redirect('siteManage');
    }
    /*
    * Create:zayar(2022/01/15) 
    * Update: 
    * This function is used to update del_flg to 1.
    */
    public function destroy($id)
    {
        $admin = new DecisionStatusModel();
        $admin->decisionStatusDelete($id);
        return redirect('siteManage');
    }
}
