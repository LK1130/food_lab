<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\M_AD_CoinRate;
use App\Models\M_Product;
use App\Models\M_Township;
use App\Models\T_CU_Customer;
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
        if (session()->has('customerId')) {
            session(['cart' => '[
                {
                    "pid": 1,
                    "q": 2,
                    "value": [{
                            "label": "A kyaw",
                            "value": "Egg"
                        },
                        {
                            "label": "A po",
                            "value": "Chill,Lemon,nananpin"
                        }
                    ]
                },{                    
                    "pid": 12,
                    "q": 10
                }
            ]']);
            $products = [];
            $delCoin = 0;
            $delCash = 0;

            $cuProducts = session('cart');
            $productArrays = json_decode($cuProducts, true);
            // for product 
            $m_product = new M_Product();
            foreach ($productArrays as $productArray) {
                $product = $m_product->products($productArray['pid']);
                array_push($products, $product);
            }

            for ($i = 0; $i < count($products); $i++) {
                $products[$i]['quantity'] = $productArrays[$i]['q'];
            }

            $customerId = session('customerId');

            $tCuCustomer = new T_CU_Customer();
            $township = $tCuCustomer->deliveryTownship($customerId);

            // for delivery fees 
            $mAdCoinRate = new M_AD_CoinRate();
            $rate = $mAdCoinRate->getRate();

            $mTownship = new M_Township();
            $fees = $mTownship->townshipFees($township->address2);

            $delCoin = $fees->delivery_price / $rate->rate;
            $delCash = $fees->delivery_price;

            Log::channel('customerlog')->info('CartController', [
                'end cart'
            ]);

            return View('customer.cart', ['products' => $products, 'delCoin' => $delCoin, 'delCash' => $delCash,]);
        }
        Log::channel('customerlog')->info('CartController', [
            'end cart'
        ]);
        return redirect('/login');
    }

    public function cartDetail()
    {
        $sessionProducts = json_decode(session('cart'), true);
        $products = $_POST['cart'];
        for ($i = 0; $i < count($products); $i++) {
            $sessionProducts[$i]['q'] = $products[$i]['q'];
        }
        $storeProduct = json_encode($sessionProducts);
        session(['cart' => $storeProduct]);
    }


    /*
     * Create :Aung Min Khant(31/1/2022)
     * Update :
     * Explain of function : add session data 
     * Prarameter : no
     * return : View deliveryInfo blade
     * */

    public function getData(Request $request)
    {

        Log::channel('adminlog')->info('CartController', [
            'start detail info'
        ]);

        $count = $request->input('qty');
        Log::critical("count", [$count]);
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
            } ]"]);
        Log::channel('customerlog')->info('CartController', [
            'end detail info'
        ]);


        // return View('customer.cart');

    }
}
