<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginValidation;
use App\Http\Requests\RegisterValidation;
use App\Mail\VerifyMail;
use App\Models\AdNews;
use App\Models\M_AD_News;
use App\Models\M_CU_Customer_Login;
use App\Models\M_Township;
use App\Models\T_CU_Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class CustomerController extends Controller
{
    /*
     * Create : Min Khant(10/1/2022)
     * Update :
     * Explain of function : For call view customer home page
     * Prarameter : no
     * return : View Home Blade
     * */
    public function foodlab()
    {
        Log::channel('customerlog')->info('Customer Controller', [
            'Start foodlab'
        ]);

        $townships = new M_Township();
        $townshipnames = $townships->townshipDetails();

        $news = new M_AD_News();
        $newDatas = $news->news();

        Log::channel('customerlog')->info('Customer Controller', [
            'End foodlab'
        ]);

        return view('customer.home', ['townships' => $townshipnames, 'news' => $newDatas]);
    }

    /*
     * Create : Min Khant(13/1/2022)
     * Update :
     * Explain of function : For call view customer policy page
     * Prarameter : no
     * return : View policyInfo Blade
     * */
    public function policy()
    {
        Log::channel('cutomerlog')->info('Customer Controller', [
            'start policy'
        ]);
        Log::channel('cutomerlog')->info('Customer Controller', [
            'end policy'
        ]);
        return view('customer.policyInfo');
    }

    /*
     * Create : Min Khant(13/1/2022)
     * Update :
     * Explain of function : For call view customer report page
     * Prarameter : no
     * return : View report Blade
     * */
    public function  report()
    {
        Log::channel('customerlog')->info('Customer Controller', [
            'start report'
        ]);
        Log::channel('customerlog')->info('Customer Controller', [
            'end report'
        ]);
        return view('customer.report');
    }

    /*
     * Create : Min Khant(13/1/2022)
     * Update :
     * Explain of function : For call view customer report page
     * Prarameter : no
     * return : View report Blade
     * */
    public function  reportData()
    {
        Log::channel('cutomerlog')->info('Customer Controller', [
            'start reportData'
        ]);
        Log::channel('cutomerlog')->info('Customer Controller', [
            'end reportData'
        ]);
        return view('customer.report');
    }

    /*
     * Create : Min Khant(13/1/2022)
     * Update :
     * Explain of function : For call view customer report page
     * Prarameter : no
     * return : View report Blade
     * */
    public function  suggest()
    {
        Log::channel('cutomerlog')->info('Customer Controller', [
            'start suggest'
        ]);

        Log::channel('cutomerlog')->info('Customer Controller', [
            'end suggest'
        ]);
        return view('customer.suggest');
    }

    /*
     * Create : Min Khant(14/1/2022)
     * Update :
     * Explain of function : For call view customer create accoutn page
     * Prarameter : no
     * return : View Register Blade
     * */
    public function access()
    {
        Log::channel('customerlog')->info('Customer Controller', [
            'start access'
        ]);

        Log::channel('customerlog')->info('Customer Controller', [
            'end access'
        ]);
        return view('customer.register');
    }

    /*
    * Create : Min Khant(14/1/2022)
    * Update :
    * Explain of function : For call view customer login page
    * Prarameter : no
    * return : redirect login
  */
    public function register(RegisterValidation  $request)
    {
        Log::channel('customerlog')->info('Customer Controller', [
            'start register'
        ]);

        return dd($request);

        $validated = $request->validated();

        //generate key
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $generateKey = '';
        for ($i = 0; $i < 128; $i++) {
            $charLength = rand(0, strlen($characters) - 1);
            $generateKey .= $characters[$charLength];
        }

        //Call T_CU_Customer for insert customer data
        $customer = new T_CU_Customer();
        $createAccount = $customer->customerData($validated, $generateKey);

        //send verify mail
        if ($createAccount) {
            $mail = [
                'title' => 'Mail Send From Laravel',
                'name' => $validated['username'],
                'body' => 'Mail Testing From laravel',
                'verifyLink' => $generateKey
            ];
            Mail::to($validated['email'])->send(new VerifyMail($mail));

            Log::channel('customerlog')->info('Customer Controller', [
                'end register'
            ]);

            return redirect('/login');
        }
    }

    /*
      * Create : Min Khant(19/1/2022)
      * Update :
      * Explain of function : For google login
      * Prarameter :
      * return :
    */
    public function google(Request $req)
    {
        Log::channel('customerlog')->info('Customer Controller', [
            'start google'
        ]);

        return $req;

        Log::channel('customerlog')->info('Customer Controller', [
            'end google'
        ]);
    }

    /*
      * Create : Min Khant(16/1/2022)
      * Update :
      * Explain of function : For verify email
      * Prarameter : generate key
      * return :
    */
    public function verifyLink($key)
    {
        Log::channel('customerlog')->info('Customer Controller', [
            'start verifyLink'
        ]);

        $link = new M_CU_Customer_Login();
        $verify = $link->updateVerifyCode($key);

        if ($verify) {
            Log::channel('customerlog')->info('Customer Controller', [
                'end verifyLink'
            ]);
            return redirect('/');
        }
    }

    /*
      * Create : Min Khant(14/1/2022)
      * Update :
      * Explain of function : For call view customer login page
      * Prarameter : no
      * return : View login Blade
      * */
    public function login()
    {
        Log::channel('customerlog')->info('Customer Controller', [
            'start login'
        ]);

        Log::channel('customerlog')->info('Customer Controller', [
            'end login'
        ]);

        return view('customer.login');
    }

    /*
      * Create : Min Khant(14/1/2022)
      * Update :
      * Explain of function : To check email and password
      * Prarameter : no
      * return : View login Blade / check mail blade
     * */
    public function loginForm(LoginValidation $request)
    {
        Log::channel('customerlog')->info('Customer Controller', [
            'start loginForm'
        ]);
        $validated = $request->validated();
        $verify = session()->get('verify');
        session()->forget('verify');

        if ($verify == 1) {
            Log::channel('customerlog')->info('Customer Controller', [
                'end loginForm'
            ]);

            return redirect('/');
        }
        session()->forget('customerId');
        
        Log::channel('customerlog')->info('Customer Controller', [
            'end loginForm'
        ]);
        
        return view('customer.mail.checkMail');
    }
}
