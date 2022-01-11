<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\adminValidation;
use App\Models\AdminLogin;
use Illuminate\Http\Request;

class loginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = new AdminLogin();
        return $admin->AdminList();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //admin add view
        return view('admin.setting.loginManage.adminAdd');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /*
    * Create:zayar(2022/01/10) 
    * Update: 
    * This is function is to store data by passing parameter to model
    * $request is used for form data
    * Return is view (adminList.blade.php)
    */
    public function store(adminValidation $request)
    {
        $validate = $request->validated();
        //call class from Adminlogin model 
        $admin = new AdminLogin();
        //pass parameter
        return $admin->AdminAdd($validate);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*
    * Create:zayar(2022/01/10) 
    * Update: 
    * This is function is to update specified user request.
    * $id is used searching this adminid.
    * Return is view (adminList.blade.php)
    */
    public function update(adminValidation $request, $id)
    {
        $validate = $request->validated();
        $admin = new AdminLogin();
        return $admin->AdminUpdate($validate, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = new AdminLogin();
        return $admin->AdminDelete($id);
    }
}
