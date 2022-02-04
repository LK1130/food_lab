<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\M_AD_News;
use App\Models\M_Fav_Type;
use App\Models\M_Product;
use App\Models\M_Product_Detail;
use App\Models\M_Site;
use App\Models\M_Taste;
use App\Models\T_AD_Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductDetailController extends Controller
{
    public function detail(Request $request){

        Log::channel('customerlog')->info('ProductDetail Controller', [
            'Start Product'
        ]);

        // $townships = new 
        // $townshipnames = $townships->townshipDetails();

        // $news = new M_AD_News();
        // $newDatas = $news->news();

        $news = new M_AD_News();
        $newDatas = $news->news();
        $newsCount = count($newDatas);
        $newsLimited = $news->newsLimited();

        $site = new M_Site();
        $name = $site->siteName();

        $product = new M_Product();
        $productId = $product->searchById($request->input('id'));
        if($productId == null)abort(404);

        $pPhoto = new T_AD_Photo();
        $productPhoto = $pPhoto->editEvd($request->input('id'));
        // dd($productId);
        $productInfos = $product->productInfo();


        $mDetail = new M_Product_Detail();
        $detail = $mDetail->searchDataById($request->input('id'));
        if($detail == null)abort(404);
            // dd($detail);

        Log::channel('customerlog')->info('ProductDetail Controller', [
            'End Product'
        ]);

        return View('customer.productDetail.productDetail',['name' => $name, 'productInfos' => $productInfos,'productId' => $productId,'photos'=> $productPhoto,'detail'=>$detail,'nav' => 'home','limitednews' => $newsLimited]);
    }

    public function productList(){

        Log::channel('customerlog')->info('ProductDetail Controller', [
            'Start get product'
        ]);

        // $townships = new 
        // $townshipnames = $townships->townshipDetails();

        // $news = new M_AD_News();
        // $newDatas = $news->news();


        $news = new M_AD_News();
        $newDatas = $news->news();
        $newsCount = count($newDatas);
        $newsLimited = $news->newsLimited();
         
        $site = new M_Site();
        $name = $site->siteName();

        $product = new M_Product();
        $productInfos = $product->productInfo();
        $allProducts = $product->showProductList();
        

        $fav = new  M_Fav_Type();
        $mFav = $fav->getTypeAll();

        $taste = new M_Taste();
        $mTaste = $taste->getTasteAll();

        Log::channel('customerlog')->info('ProductDetail Controller', [
            'End get product'
        ]);

        return View('customer.productDetail.product',['name' => $name, 'productInfos' => $productInfos,'products' => $allProducts,'mFav' => $mFav, 'mTaste' => $mTaste,'nav' => 'home','limitednews' => $newsLimited]);
    }


    

    
}
