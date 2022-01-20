<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderValidation;
use App\Models\M_Order_Status;
use App\Models\OrderStatusModel;
use Illuminate\Http\Request;

class OrderStatusController extends Controller
{
    /*
    * Create:zayar(2022/01/15) 
    * Update: 
    * This function is used to show Order Status add view.
    */

    public function create()
    {
        return view('admin.setting.appManage.orderStatusAdd');
    }
    /*
    * Create:zayar(2022/01/15) 
    * Update: 
    * This function is used to store Order Status.
    */

    public function store(OrderValidation $request)
    {
        $validate = $request->validated();
        $admin = new M_Order_Status();
        $admin->orderStatusAdd($validate);
        return redirect('siteManage');
    }
    /*
    * Create:zayar(2022/01/15) 
    * Update: 
    * This function is used to show Order Status edit view.
    */

    public function show($id)
    {
        $admin = new M_Order_Status();
        $admins =  $admin->orderStatusEditView($id);
        return view('admin.setting.appManage.orderStatusEdit', ['orderstatus' => $admins]);
    }
    /*
    * Create:zayar(2022/01/15) 
    * Update: 
    * This function is used to update Order Status.
    */

    public function update(OrderValidation $request, $id)
    {
        $validate = $request->validated();
        $admin = new M_Order_Status();
        $admin->orderStatusEdit($validate, $id);
        return redirect('siteManage');
    }
    /*
    * Create:zayar(2022/01/15) 
    * Update: 
    * This function is used to update del_flg to 1.
    */
    public function destroy($id)
    {
        $admin = new M_Order_Status();
        $admin->orderStatusDelete($id);
        return redirect('siteManage');
    }
}
