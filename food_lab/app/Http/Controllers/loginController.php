<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\adminValidation;
use App\Models\AdminLogin;
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
        $admin = new AdminLogin();
        return $admin->AdminList();
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
        $admin = new AdminLogin();
        //pass parameter
        return $admin->AdminAdd($validate);
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
        $admin = new AdminLogin();
        return $admin->AdminDetail($id);
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
        $admin = new AdminLogin();
        return $admin->AdminEdit($id);
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
        $validate = $request->validated();
        $admin = new AdminLogin();
        return $admin->AdminUpdate($validate, $id);
    }

    /*
    * Create:zayar(2022/01/12) 
    * Update: 
    * This is function is to delete specified user request.
    * $id is used searching this adminid.
    * Return is view (adminList.blade.php)
    */
    public function destroy($id)
    {
        $admin = new AdminLogin();
        return $admin->AdminDelete($id);
    }
}
