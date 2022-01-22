<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminLoginValidation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{

    /*
      * Create : Min Khant(20/1/2022)
      * Update :
      * Explain of function : For call view admin login page
      * Prarameter : no
      * return : View admin login Blade
    */
    public function loginPage()
    {
        Log::channel('adminlog')->info('AdminController', [
            'start loginPage'
        ]);

        Log::channel('adminlog')->info('AdminController', [
            'end loginPage'
        ]);

        return view('admin.adminLogin');
    }


    /*
      * Create : Min Khant(20/1/2022)
      * Update :
      * Explain of function : To check admin login username and password
      * Prarameter : $request
      * return : redirect dashboard
    */
    public function loginForm(AdminLoginValidation $request)
    {
        Log::channel('adminlog')->info('AdminController', [
            'start loginForm'
        ]);

        Log::channel('adminlog')->info('AdminController', [
            'end loginForm'
        ]);

        return redirect('/dashboard');
    }

    /*
      * Create : Min Khant(20/1/2022)
      * Update :
      * Explain of function : To delete session data 
      * Prarameter : $request
      * return : redirect view admin blade
    */
    public function logout()
    {
        Log::channel('adminlog')->info('AdminController', [
            'start logout'
        ]);

        session()->forget('adminId');
        session()->forget('role');

        Log::channel('adminlog')->info('AdminController', [
            'end logout'
        ]);
        return redirect('/admin');
    }
}
