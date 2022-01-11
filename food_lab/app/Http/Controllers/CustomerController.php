<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /*
     * Create : Min Khant(10/1/2022)
     * Update :
     * Explain of function : For call view customer home blade
     * Prarmeter : no
     * return : View Home Blade
     * */
    public function foodlab()
    {
        return view('customer.home');
    }
}
