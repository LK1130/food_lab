<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
    public function orderList()
    {
    }

    /*
     * Create : Min Khant(28/1/2022)
     * Update :
     * Explain of function : For call view customer cart page
     * Prarameter : no
     * return : View cart Blade
     * */
    public function cart()
    {
        Log::channel('customerlog')->info('CartController', [
            'start cart'
        ]);

        Log::channel('customerlog')->info('CartController', [
            'end cart'
        ]);
        return View('customer.cart');
    }

    /*
     * Create : Min Khant(28/1/2022)
     * Update :
     * Explain of function : For call view customer delivery info page
     * Prarameter : no
     * return : View deliveryInfo blade
     * */
    public function deliveryInfo()
    {
        Log::channel('customerlog')->info('CartController', [
            'start deliveryInfo'
        ]);

        Log::channel('customerlog')->info('CartController', [
            'end deliveryInfo'
        ]);

        return View('customer.deliveryInfo');
    }

    /*
     * Create :Aung Min Khant(31/1/2022)
     * Update :
     * Explain of function : add session data 
     * Prarameter : no
     * return : View deliveryInfo blade
     * */

    public function getData(Request $request){

        Log::channel('adminlog')->info('CartController', [
            'start detail info'
        ]);
        
        $count = $request->input('qty');
        Log::critical("count",[$count]);
        session(["cart" => "[{
                'pid' : 1,
                'q': 2,
                'value': [{
                        'label': 'A kyaw',
                        'value': 'Egg'
                    },
                    {
                        'label': 'A po',
                        'value': 'Chill,Lemon,nananpin
                    }
                ]
            } ]" ]);
        Log::channel('customerlog')->info('CartController', [
            'end detail info'
        ]);


        // return View('customer.cart');
        
    }
}
