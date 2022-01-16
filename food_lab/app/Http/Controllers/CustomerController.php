<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterValidation;
use App\Models\AdNews;
use App\Models\Customer;
use App\Models\CustomerLogin;
use App\Models\Township;
use Illuminate\Http\Request;

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
        $townships = new Township();
        $townshipnames = $townships->townshipDetails();

        $news = new AdNews();
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

        $customer = new Customer();
        $customer->customerData($validated);

        return redirect('/login');
    }
}
