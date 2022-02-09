<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginValidation;
use App\Http\Requests\RegisterValidation;
use App\Http\Requests\UpdateProfileValidation;
use App\Http\Requests\ReportFormValidation;
use App\Http\Requests\SuggestFormValidation;
use App\Mail\VerifyMail;
use App\Models\AdNews;
use App\Models\M_AD_CoinCharge_Message;
use App\Models\M_AD_News;
use App\Models\M_AD_Track;
use App\Models\M_CU_Customer_Login;
use App\Models\M_Fav_Type;
use App\Models\M_Product;
use App\Models\M_Site;
use App\Models\M_State;
use App\Models\M_Suggest;
use App\Models\M_Taste;
use App\Models\M_Township;
use App\Models\T_AD_Order;
use App\Models\T_AD_OrderDetail;
use App\Models\T_AD_Report;
use App\Models\T_AD_Suggest;
use App\Models\T_CU_Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class CustomerController extends Controller
{
    /*
     * Create : Min Khant(10/1/2022)
     * Update : zayar(24/1/2022)
     * Explain of function : For call view customer home page
     * Prarameter : no
     * return : View Home Blade
     * */
    public function home()
    {
        Log::channel('customerlog')->info('Customer Controller', [
            'Start foodlab'
        ]);


        $recomProducts = [];


        if (session()->has('customerId')) {
            $sessionCustomerId = session()->get('customerId');
            $user = new T_CU_Customer();
            $custoemrInfo = $user->customerInformation($sessionCustomerId);
            $favTypes = explode(",", $custoemrInfo[0]['fav_type']);
            $mFavType = new M_Fav_Type();
            $product = new M_Product();
            foreach ($favTypes as $favType) {
                $id = $mFavType->customerFavType($favType);
                $eachProduct = $product->customerFavType($id['id']);
                array_push($recomProducts, $eachProduct);
            }
        }

        $townships = new M_Township();
        $townshipnames = $townships->townshipDetails();

        $news = new M_AD_News();
        $newDatas = $news->news();

        $site = new M_Site();
        $name = $site->siteName();

        $tAdOrderDetail = new T_AD_OrderDetail();
        $sellProducts = $tAdOrderDetail->bestSellItems();

        return view('customer.home', [
            'townships' => $townshipnames,
            'news' => $newDatas,
            'name' => $name,
            'sellProducts' => $sellProducts,
            'recomProducts' => $recomProducts,
            'nav' => 'home'
        ]);
    }

    /*
     * Create : zayar(25/1/2022)
     * Update :
     * Explain of function : For news page
     * Prarameter : no
     * return : View news Blade
     * */
    public function news()
    {
        $site = new M_Site();
        $name = $site->siteName();
        Log::channel('cutomerlog')->info('Customer Controller', [
            'start news'
        ]);
        $news = new M_AD_News();
        $allnews = $news->newsAll();
        Log::channel('cutomerlog')->info('Customer Controller', [
            'end news'
        ]);
        return view('customer.news', [
            'news' => $allnews,
            'allnews' => $allnews,
            'name' => $name,
            'nav' => 'inform'
        ]);
    }

    /*
     * Create : zayar(25/1/2022)
     * Update :
     * Explain of function : For message page
     * Prarameter : no
     * return : View message Blade
     * */
    public function message()
    {
        $allmessage = [];

        if (session()->has('customerId')) {
            $sessionCustomerId = session('customerId');
            $messages = new M_AD_CoinCharge_Message();
            $allmessage = $messages->allMessage($sessionCustomerId);
        }
        $site = new M_Site();
        $name = $site->siteName();
        $news = new M_AD_News();
        $allnews = $news->newsAll();
        Log::channel('cutomerlog')->info('Customer Controller', [
            'start news'
        ]);
        Log::channel('cutomerlog')->info('Customer Controller', [
            'end news'
        ]);

        return view('customer.messages', [
            'allmessages' => $allmessage,
            'news' => $allnews,
            'name' => $name,

            'nav' => 'inform'
        ]);
    }

    /*
     * Create : zayar(25/1/2022)
     * Update :
     * Explain of function : For tracks page
     * Prarameter : no
     * return : View message Blade
     * */
    public function tracks()
    {
        Log::channel('cutomerlog')->info('Customer Controller', [
            'start news'
        ]);
        $alltracks = [];
        if (session()->has('customerId')) {

            $sessionCustomerId = session('customerId');
            $tracks = new M_AD_Track();
            $alltracks = $tracks->allTracks($sessionCustomerId);
        }

        $news = new M_AD_News();
        $newDatas = $news->news();

        $site = new M_Site();
        $name = $site->siteName();
        Log::channel('cutomerlog')->info('Customer Controller', [
            'end news'
        ]);

        return view('customer.tracks', [
            'alltracks' => $alltracks,
            'news' => $newDatas,
            'name' => $name,
            'nav' => 'inform'
        ]);
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

        $msite = new M_Site();
        $policys = $msite->policy();


        Log::channel('cutomerlog')->info('Customer Controller', [
            'end policy'
        ]);

        return view('customer.information.policyInfo', ['policys' => $policys]);
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
        if (session()->has('customerId')) {
            $customerid = session()->get('customerId');
            $order = new T_AD_Order();
            $orderlists = $order->orderId($customerid);

            Log::channel('customerlog')->info('Customer Controller', [
                'end report'
            ]);
            return view('customer.feedback.report', ['orderlists' => $orderlists]);
        }
        Log::channel('customerlog')->info('Customer Controller', [
            'end report'
        ]);

        return redirect('/');
    }

    /*
     * Create : Min Khant(13/1/2022)
     * Update :
     * Explain of function : For call view customer report page
     * Prarameter : no
     * return : View report Blade
     * */
    public function  reportForm(ReportFormValidation $request)
    {
        Log::channel('cutomerlog')->info('Customer Controller', [
            'start reportData'
        ]);

        $validated = $request->validated();
        $report = new T_AD_Report();
        $report->customerReport($validated);

        Log::channel('cutomerlog')->info('Customer Controller', [
            'end reportData'
        ]);
        return redirect('/');
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
        Log::channel('customerlog')->info('CustomerController', [
            'start suggest'
        ]);
        if (session()->has('customerId')) {
            $data = new M_Suggest();
            $type = $data->suggestType();

            Log::channel('customerlog')->info('CustomerController', [
                'end suggest'
            ]);
            return view('customer.feedback.suggest', ['types' => $type]);
        }
        Log::channel('customerlog')->info('CustomerController', [
            'end suggest'
        ]);
        return redirect('/');
    }

    /*
     * Create : Min Khant(13/1/2022)
     * Update :
     * Explain of function : To stroe data from suggest form
     * Prarameter : no
     * return : 
     * */
    public function suggestForm(SuggestFormValidation $request)
    {
        Log::channel('customerlog')->info('CustomerController', [
            'start suggestForm'
        ]);

        $validated = $request->validated();
        $suggest = new T_AD_Suggest();
        $suggest->customerSuggest($validated);

        Log::channel('customerlog')->info('CustomerController', [
            'end suggestForm'
        ]);

        return redirect('/');
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
        if (!session()->has('customerId')) {
            $mTownship = new M_Township();
            $townshipnames = $mTownship->townshipDetails();

            $mstate = new M_State();
            $staenames = $mstate->stateName();

            $mFavType = new M_Fav_Type();
            $types = $mFavType->type();

            $mTaste = new M_Taste();
            $tastenames = $mTaste->taste();

            Log::channel('customerlog')->info('Customer Controller', [
                'end access'
            ]);
            return view('customer.access.register', ['townshipnames' => $townshipnames, 'staenames' => $staenames, 'types' => $types, 'tastenames' => $tastenames]);
        }
        Log::channel('customerlog')->info('Customer Controller', [
            'end access'
        ]);
        return redirect('/');
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
        $createAccount = $customer->customerData($request, $generateKey);

        $msite = new M_Site();
        $siteName = $msite->siteName();

        //send verify mail
        if ($createAccount) {
            $mail = [
                'name' => $validated['username'],
                'siteName' => $siteName->site_name,
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
            return redirect('/login');
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
        if (!session()->has('customerId')) {
            Log::channel('customerlog')->info('Customer Controller', [
                'end login'
            ]);

            return view('customer.access.login');
        }
        Log::channel('customerlog')->info('Customer Controller', [
            'end login'
        ]);

        return redirect('/');
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

        return view('customer.access.checkMail');
    }

    /*
      * Create : Min Khant(14/1/2022)
      * Update :
      * Explain of function : To logout
      * Prarameter : no
      * return : View home
     * */
    public function logout()
    {
        Log::channel('customerlog')->info('Customer Controller', [
            'start logout'
        ]);
        session()->forget('customerId');

        Log::channel('customerlog')->info('Customer Controller', [
            'end logout'
        ]);

        return redirect('/');
    }

    /*
      * Create : Min Khant(14/1/2022)
      * Update :
      * Explain of function : To logout
      * Prarameter : no
      * return : View home
     * */
    public function getNews()
    {
        Log::channel('customerlog')->info('Customer Controller', [
            'start getNews'
        ]);
        $news = new M_AD_News();
        $newsLimited = $news->newsLimited();
        $newDatas = $news->news();
        $newsCount = count($newDatas);
        Log::channel('customerlog')->info('Customer Controller', [
            'end getNews'
        ]);

        return response()
            ->json([
                'limitednews'
                => $newsLimited,
                'alertCount' => $newsCount
            ]);
    }
}
