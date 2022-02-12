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

use function PHPUnit\Framework\returnSelf;

class CartController extends Controller
{
    public function orderList()
    {
    }

    /*
     * Create : Min Khant(28/1/2022)
     * Update :
     * Explain of function : get product info , calculate total amount adn  call view customer cart page
     * Prarameter : no
     * return : View cart Blade
     * */
    public function cart()
    {
        Log::channel('customerlog')->info('CartController', [
            'start cart'
        ]);
        if (session()->has('customerId')) {
            $products = [];
            $cuProducts = session('cart');

        
            $productArrays = $cuProducts;
            if (count($productArrays) != 0) {
                // for product 
                $m_product = new M_Product();
                foreach ($productArrays as $productArray) {
                    $product = $m_product->products((int)$productArray['pid']);
                    array_push($products, $product);
                }

                // add quantity in product array from session quantity 
                for ($i = 0; $i < count($products); $i++) {
                    $products[$i]['quantity'] = (int)$productArrays[$i]['q'];
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
            return redirect('/');
        }
        Log::channel('customerlog')->info('CartController', [
            'end cart'
        ]);
        return redirect('/login');
    }

    /*
     * Create : Min Khant(28/1/2022)
     * Update :admin
     * Explain of function : get product info , calculate total amount and store session product detail
     * Prarameter : no
     * return : no
     * */
    public function cartDetail()
    {
        Log::channel('custoerlog')->info('CartController', [
            'start cartDetail'
        ]);
        $customerId = session('customerId');
        $tCuCustomer = new T_CU_Customer();
        $township = $tCuCustomer->deliveryTownship($customerId);

        $totalCoin = 0;
        $totalCash = 0;
        $products = [];
        $productArrays = session('cart');
        $postProducts = $_POST['cart'];

        // to get product info
        $m_product = new M_Product();
        foreach ($productArrays as $productArray) {
            $product = $m_product->products((int)$productArray['pid']);
            array_push($products, $product);
        }

        $mTownship = new M_Township();
        $fees = $mTownship->townshipFees($township->address2);

        // get delivery fees 
        $mAdCoinRate = new M_AD_CoinRate();
        $rate = $mAdCoinRate->getRate();

        // get coin rate 
        $delCoin = $fees->delivery_price / $rate->rate;
        $delCash = $fees->delivery_price;
        // change quantity in session data  and cal total coin,cash
        for ($i = 0; $i < count($postProducts); $i++) {
            $productArrays[$i]['q'] = $postProducts[$i]['q'];

            $productCoin = $products[$i]['coin'] * $postProducts[$i]['q'];
            $productCash = $products[$i]['amount'] * $postProducts[$i]['q'];
            $productArrays[$i]['coin'] = $productCoin;
            $productArrays[$i]['cash'] = $productCash;

            $totalCoin += $productCoin;
            $totalCash += $productCash;
        }
        $grandCoin = $totalCoin + $delCoin;
        $grandCash = $totalCash + $delCash;

        // store session product 
        $storeProduct = $productArrays;
        session(['cart' => $storeProduct, 'grandCoin' => $grandCoin, 'grandCash' => $grandCash]);

        Log::channel('custoerlog')->info('CartController', [
            'end cartDetail'
        ]);
    }

    /*
     * Create : Min Khant(1/2/2022)
     * Update :admin
     * Explain of function : delete session product 
     * Prarameter : no
     * return : no
     * */
    public function deleteProduct()
    {
        Log::channel('custoemrlog')->info('CartController', [
            'start deleteProduct'
        ]);

        $sessionProduct = [];
        $productArrays = session('cart');
        $id = $_POST['id'];
        unset($productArrays[$id - 1]);
        foreach ($productArrays as $productArray) {
            array_push($sessionProduct, $productArray);
        }

        session(['cart' => $sessionProduct]);
        Log::channel('custoemrlog')->info('CartController', [
            'end deleteProduct'
        ]);
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

        Log::channel('customerlog')->info('CartController', [
            'start detail info'
        ]);

        $products = [];
        $newProduct = $request->data;
        if (session()->has('cart')) {
            $product = session('cart');
            session()->forget('cart');
            if (count($product) > 1) {
                foreach ($product as $item) {
                    array_push($products, $item);
                }
            } else {
                array_push($products, $product[0]);
            }
        }
        array_push($products, $newProduct);
        session(['cart' => $products]);

        Log::channel('customerlog')->info('CartController', [
            'end detail info'
        ]);
        return session('cart');
    }

     /*
     * Create :Aung Min Khant(9/2/2022)
     * Update :
     * Explain of function : get session count from view page
     * Prarameter : request from ajax
     * return : 
     * */

        public function getSessionCount(Request $request){

            Log::channel('customerlog')->info('CartController', [
                'start getSessionCount'
            ]);

            $products = $request->data;
            session(['cart' => $products]);
            
            
            Log::channel('customerlog')->info('CartController', [
                'end getSessionCount'
            ]);

            // return session('cart');
        }
}
