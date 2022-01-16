<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaymentValidation;
use App\Models\PaymentModel;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /*
    * Create:zayar(2022/01/15) 
    * Update: 
    * This function is used to show payment add view.
    */

    public function create()
    {
        return view('admin.setting.appManage.paymentAdd');
    }

    /*
    * Create:zayar(2022/01/15) 
    * Update: 
    * This function is used to store payment.
    */

    public function store(PaymentValidation $request)
    {
        $validate = $request->validated();
        $admin = new PaymentModel();
        $admin->paymentAdd($validate);
        return redirect('siteManage');
    }

    /*
    * Create:zayar(2022/01/15) 
    * Update: 
    * This function is used to show payment edit view.
    */

    public function show($id)
    {
        $admin = new PaymentModel();
        $admins =  $admin->paymentEditView($id);
        return view('admin.setting.appManage.paymentEdit', ['payment' => $admins]);
    }

    /*
    * Create:zayar(2022/01/15) 
    * Update: 
    * This function is used to update payment.
    */

    public function update(PaymentValidation $request, $id)
    {
        $validate = $request->validated();
        $admin = new PaymentModel();
        $admin->paymentEdit($validate, $id);
        return redirect('siteManage');
    }

    /*
    * Create:zayar(2022/01/15) 
    * Update: 
    * This function is used to update del_flg to 1.
    */
    public function destroy($id)
    {
        $admin = new PaymentModel();
        $admin->paymentDelete($id);
        return redirect('siteManage');
    }
}
