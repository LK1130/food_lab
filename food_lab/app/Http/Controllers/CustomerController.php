<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterValidation;
use App\Http\Requests\UpdateProfileValidation;
use App\Models\AdNews;
use App\Models\M_AD_CoinCharge_Message;
use App\Models\M_AD_News;
use App\Models\M_AD_Track;
use App\Models\M_Township;
use App\Models\T_CU_Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CustomerController extends Controller
{
    /*
     * Create : Min Khant(10/1/2022)
     * Update : zayar(21/1/2022)
     * Explain of function : For call view customer home page
     * Prarameter : no
     * return : View Home Blade
     * */
    public function foodlab()
    {
        $sessionCustomerId = 1; //need to change
        $townships = new M_Township();
        $townshipnames = $townships->townshipDetails();

        $news = new M_AD_News();
        $newDatas = $news->news();
        $newsLimited = $news->newsLimited();

        $messages = new M_AD_CoinCharge_Message();
        $messageLimited = $messages->informMessage($sessionCustomerId);

        $tracks = new M_AD_Track();
        $tracksLimited = $tracks->trackLimited($sessionCustomerId);

        $user = new T_CU_Customer();
        $userinfo = $user->loginUser($sessionCustomerId);
        if ($userinfo === null) {
            Log::channel('adminlog')->info("CustomerController", [
                'End foodlab(error)'
            ]);
            return view('errors.404');
        } else {
            Log::channel('adminlog')->info("CustomerController", [
                'End foodlab'
            ]);
            return view('customer.home', [
                'townships' => $townshipnames,
                'news' => $newDatas,
                'user' => $userinfo,
                'limitednews' => $newsLimited,
                'limitedmessages' => $messageLimited,
                'limitedtracks' => $tracksLimited
            ]);
        }
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
      * return : View login Blade
      * */
    public function login()
    {
        return view('customer.login');
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

        $customer = new T_CU_Customer();
        $customer->customerData($validated);

        return redirect('/login');
    }

    /*
      * Create : zayar(22/1/2022)
      * Update :
      * Explain of function : to update profile
      * Prarameter : no
      * return : redirect home
    */
    public function updateProfile(UpdateProfileValidation  $request)
    {
        $validated = $request->validated();
        $customer = new T_CU_Customer();
        $customer->customerData($validated);

        return redirect('/');
    }
}
