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
        $townships = new M_Township();
        $townshipnames = $townships->townshipDetails();

        $news = new M_AD_News();
        $newDatas = $news->news();
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
        $validated = $request->validated();

        //generate key
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $generateKey = '';
        for ($i = 0;$i < 128;$i++){
            $charLength = rand(0,strlen($characters)-1);
            $generateKey .= $characters[$charLength];
        }

        //Call T_CU_Customer for insert customer data
        $customer = new T_CU_Customer();
        $createAccount = $customer->customerData($validated,$generateKey);

        //send verify mail
        if($createAccount){
            $mail = [
                'title' => 'Mail Send From Laravel',
                'name' => $validated['username'],
                'body' => 'Mail Testing From laravel',
                'verifyLink' => $generateKey
            ];
            Mail::to($validated['email'])->send(new VerifyMail($mail));

            return redirect('/login');
        }
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
        $link = new M_CU_Customer_Login();
        $verify = $link->updateVerifyCode($key);

        if($verify){
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
        return view('customer.login');
    }

    /*
      * Create : Min Khant(14/1/2022)
      * Update :
      * Explain of function : To check email and password
      * Prarameter : no
      * return : View login Blade
     * */
    public function loginForm(LoginValidation $request)
    {
        $validated = $request->validated();
        $verify = session()->get('verify');
        session()->forget('verify');

        if($verify == 1){
            return redirect('/');
        }
        return "please check your email";
    }

}
