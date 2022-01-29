<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\M_Product;
use App\Models\M_Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductDetailController extends Controller
{
    public function detail(){

        Log::channel('customerlog')->info('ProductDetail Controller', [
            'Start Product'
        ]);

        // $townships = new 
        // $townshipnames = $townships->townshipDetails();

        // $news = new M_AD_News();
        // $newDatas = $news->news();

        $site = new M_Site();
        $name = $site->siteName();

        $product = new M_Product();
        $productInfos = $product->productInfo();

        Log::channel('customerlog')->info('ProductDetail Controller', [
            'End Product'
        ]);

        return View('customer.productDetail.productDetail',['name' => $name, 'productInfos' => $productInfos]);
    }

    public function productList(){

        Log::channel('customerlog')->info('ProductDetail Controller', [
            'Start get product'
        ]);

        // $townships = new 
        // $townshipnames = $townships->townshipDetails();

        // $news = new M_AD_News();
        // $newDatas = $news->news();

        $site = new M_Site();
        $name = $site->siteName();

        $product = new M_Product();
        $productInfos = $product->productInfo();

        Log::channel('customerlog')->info('ProductDetail Controller', [
            'End get product'
        ]);

        return View('customer.productDetail.product',['name' => $name, 'productInfos' => $productInfos]);
    }
    
}
