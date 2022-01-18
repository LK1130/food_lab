<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\adminValidation;
use App\Models\AdminLogin;
use App\Models\M_AD_Login;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    * Create:zayar(2022/01/12) 
    * Update: 
    * This is function is to show admin list view.
    * Return is view (adminList.blade.php)
    */
    public function index()
    {
        $admin = new M_AD_Login();
        $admins = $admin->AdminList();
        return view('admin.setting.loginManage.adminList', ['admins' => $admins]);
    }


    /*
    * Create:zayar(2022/01/12) 
    * Update: 
    * This is function is to show admin adding view.
    * Return is view (adminList.blade.php)
    */
    public function create()
    {

        return view('admin.setting.loginManage.adminAdd');
    }

    /*
    * Create:zayar(2022/01/10) 
    * Update: 
    * This is function is to store data by passing parameter to model
    * $request is used for form data
    * Return is view (adminList.blade.php)
    */
    public function store(AdminValidation $request)
    {
        $validate = $request->validated();
        //call class from Adminlogin model 
        $admin = new M_AD_Login();
        //pass parameter
        $admin->AdminAdd($validate);
        return redirect('adminLogin');
    }


    /*
    * Create:zayar(2022/01/10) 
    * Update: 
    * This is function is to show specified resource.
    * $id is used searching this userid
    * Return is view (adminList.blade.php)
    */
    public function show($id)
    {
        $find = M_AD_Login::where('id', '=', $id)->first();
        if ($find === null) {
            return view('errors.404');
        } else {
            $admin = new M_AD_Login();
            $admins = $admin->AdminDetail($id);
            return view('admin.setting.loginManage.adminDetail', ['admins' => $admins]);
        }
    }
    /*
    * Create:zayar(2022/01/10) 
    * Update: 
    * This is function is to show specified resource in Admin Edit View..
    * $id is used searching this adminid.
    * Return is view (adminList.blade.php)
    */
    public function edit($id)
    {
        $find = M_AD_Login::where('id', '=', $id)->first();
        if ($find === null) {
            return view('errors.404');
        } else {
            $admin = new M_AD_Login();
            $admins = $admin->AdminEdit($id);
            return view('admin.setting.loginManage.adminEdit', ['admins' => $admins]);
        }
    }

    /*
    * Create:zayar(2022/01/10) 
    * Update: 
    * This is function is to update specified user request.
    * $id is used searching this adminid.
    * Return is view (adminList.blade.php)
    */
    public function update(AdminValidation $request, $id)
    {
        $find = M_AD_Login::where('id', '=', $id)->first();
        if ($find === null) {
            return view('errors.404');
        } else {
            $validate = $request->validated();
            $admin = new M_AD_Login();
            $admin->AdminUpdate($validate, $id);
            return redirect('adminLogin');
        }
    }

    /*
    * Create:zayar(2022/01/12) 
    * Update: 
    * This is function is to delete specified user request.
    * $id is used searching this adminid.
    * Return is view (adminList.blade.php)
    */
    public  function destroy($id)
    {


        $find = M_AD_Login::where('id', '=', $id)->first();
        if ($find === null) {
            return view('errors.404');
        } else {
            $admin = new M_AD_Login();
            $admin->AdminDelete($id);
            return redirect('adminLogin');
        }
    }
}
