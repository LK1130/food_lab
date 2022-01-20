<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\M_AD_CoinRate;
use App\Models\M_Fav_Type;
use App\Models\M_Product;
use App\Models\M_Product_Detail;
use App\Models\M_Taste;
use App\Models\T_AD_Evd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Symfony\Component\Console\Input\Input;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /*
    * Create : Aung Min Khant(17/1/2022)
    * Update :
    * Explain of function : To get data from m_fav_type and m_taste database and view to add product form
    * return fav type data and taste data to product add view
    * */

    public function index()
    {
        $fav = new  M_Fav_Type();
        $mFav = $fav->getTypeAll();

        $taste = new M_Taste();
        $mTaste = $taste->getTasteAll();

        $mrate = new M_AD_CoinRate();
        $rates = $mrate->getRate();

        return View('admin.product.productAdd', ['mFav' => $mFav, 'mTaste' => $mTaste, 'rates' => $rates, 'active' => 6]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /*
    * Create : Aung Min Khant(17/1/2022)
    * Update :
    * Explain of function : To insert data from request to product database
    * parament : all requestes from  product form
    * return : save data
    * */
    public function store(Request $request)
    {

        Log::channel('adminlog')->info("Product Controller", [
            'Start Store Data'
        ]);

        $request->validate([
            'pname' => 'required',
            'coin' => 'required|min:0',
            'photo1' => 'required||max:51200',
            'photo2' => 'max:51200',
            'photo3' => 'max:51200',
            'photo4' => 'max:51200',
            'photo5' => 'max:51200',
            'photo6' => 'max:51200',
            'list' => 'required',
            'pdesc' => 'required'
            
        ]);
        DB::transaction(function () use ($request) {
            $labels = [];
            $categories = [];
            $valueOne = [];
            $valueTwo = [];
            $valueThree = [];
            $valueFour = [];
            $valueFive = [];
            $valueSix = [];
            $allValues = [];
            $images = [];


            $pdController = new ProductListController();
            $pdController->checkCategory($request);

            if ($request->hasFile('photo1')) {
                array_push($images, $request->file('photo1'));
            }
            if ($request->hasFile('photo2')) {
                array_push($images, $request->file('photo2'));
            }
            if ($request->hasFile('photo3')) {
                array_push($images, $request->file('photo3'));
            }
            if ($request->hasFile('photo4')) {
                array_push($images, $request->file('photo4'));
            }
            if ($request->hasFile('photo5')) {
                array_push($images, $request->file('photo5'));
            }
            if ($request->hasFile('photo6')) {
                array_push($images, $request->file('photo6'));
            }

            if ($request->has('pdname1') && $request->has('pdvalue1')) {
                array_push($labels, $request->input("pdname1"));
                $valueOne = explode(",", $request->input("pdvalue1"));
                array_push($allValues, $valueOne);
                array_push($categories, $request->input('category1'));
            }
            if ($request->has('pdname2') && $request->has('pdvalue2')) {
                array_push($labels, $request->input("pdname2"));
                $valueTwo = explode(",", $request->input("pdvalue2"));
                array_push($allValues, $valueTwo);
                array_push($categories, $request->input('category2'));
            }
            if ($request->has('pdname3') && $request->has('pdvalue3')) {
                array_push($labels, $request->input("pdname3"));
                $valueThree = explode(",", $request->input("pdvalue3"));
                array_push($allValues, $valueThree);
                array_push($categories, $request->input('category3'));
            }
            if ($request->has('pdname4') && $request->has('pdvalue4')) {
                array_push($labels, $request->input("pdname4"));
                $valueFour = explode(",", $request->input("pdvalue4"));
                array_push($allValues, $valueFour);
                array_push($categories, $request->input('category4'));
            }
            if ($request->has('pdname5') && $request->has('pdvalue5')) {
                array_push($labels, $request->input("pdname5"));
                $valueFive = explode(",", $request->input("pdvalue5"));
                array_push($allValues, $valueFive);
                array_push($categories, $request->input('category5'));
            }
            if ($request->has('pdname6') && $request->has('pdvalue6')) {
                array_push($labels, $request->input("pdname6"));
                $valueSix = explode(",", $request->input("pdvalue6"));
                array_push($allValues, $valueSix);
                array_push($categories, $request->input('category6'));
            }

            $product = new M_Product();
            $finalProduct = $product->saveData($request);

            $productDetail = new M_Product_Detail();
            $evd = new T_AD_Evd();
            // Log::critical("array", [$labels, $images, $allValues]);

            for ($x = 0; $x < count($images); $x++) {

                $path = $images[$x]->store('ProductImage');
                $evd->insertImage($path, $finalProduct);
            }
            for ($i = 0; $i < count($labels); $i++) {
                $value = $allValues[$i];
                for ($j = 0; $j < count($value); $j++) {
                    $order = $j + 1;
                    $productDetail->insert($finalProduct, $categories[$i], $labels[$i], $order, $value[$j]);
                }
            }
        });


        Log::channel('adminlog')->info("Product Controller", [
            'End Store Data'
        ]);

        return redirect('productList');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        Log::channel('adminlog')->info("Product Controller", [
            'Start edit Data'
        ]);

        $taste = new M_Taste();
        $mTaste = $taste->getTasteAll();

        $type = new M_Fav_Type();
        $mFav = $type->getTypeAll();

        $mProduct = new M_Product();
        $product = $mProduct->getDataById($id);

        $mDetail = new M_Product_Detail();
        $mProductDetail = $mDetail->editData($id);

        $tEvd = new T_AD_Evd();
        $evd = $tEvd->editEvd($id);

        $mrate = new M_AD_CoinRate();
        $rates = $mrate->getRate();

        Log::channel('adminlog')->info("Product Controller", [
            'End edit Data'
        ]);
        // return $product_detail;
        return View('admin.product.productEdit', ['mFav' => $mFav, 'mTaste' => $mTaste, 'products' => $product, "pdetails" => $mProductDetail, 'evd' => $evd,'rates'=>$rates]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Log::channel('adminlog')->info("Product Controller", [
            'Start Update Data'
        ]);


        $request->validate([
            'pname' => 'required',
            'coin' => 'required|min:0',
            // 'photo1' => 'required'
        ]);

        DB::transaction(function () use ($request, $id) {
            $labels = [];
            $categories = [];
            $valueOne = [];
            $valueTwo = [];
            $valueThree = [];
            $valueFour = [];
            $valueFive = [];
            $valueSix = [];
            $allValues = [];
            $images = [];
          
            //still missing part
        // Log::critical("hidden file",[$request->hasFile('hide1'),]);
            $pdController = new ProductListController();
            $pdController->checkCategory($request);

            if ($request->hasFile('photo1')) {
                array_push($images, $request->file('photo1'));
            }
            if ($request->hasFile('photo2')) {
                array_push($images, $request->file('photo2'));
            }
            if ($request->hasFile('photo3')) {
                array_push($images, $request->file('photo3'));
            }
            if ($request->hasFile('photo4')) {
                array_push($images, $request->file('photo4'));
            }
            if ($request->hasFile('photo5')) {
                array_push($images, $request->file('photo5'));
            }
            if ($request->hasFile('photo6')) {
                array_push($images, $request->file('photo6'));
            }

            if ($request->has('pdname1') && $request->has('pdvalue1')) {
                array_push($labels, $request->input("pdname1"));
                $valueOne = explode(",", $request->input("pdvalue1"));
                array_push($allValues, $valueOne);
                array_push($categories, $request->input('category1'));
            }
            if ($request->has('pdname2') && $request->has('pdvalue2')) {
                array_push($labels, $request->input("pdname2"));
                $valueTwo = explode(",", $request->input("pdvalue2"));
                array_push($allValues, $valueTwo);
                array_push($categories, $request->input('category2'));
            }
            if ($request->has('pdname3') && $request->has('pdvalue3')) {
                array_push($labels, $request->input("pdname3"));
                $valueThree = explode(",", $request->input("pdvalue3"));
                array_push($allValues, $valueThree);
                array_push($categories, $request->input('category3'));
            }
            if ($request->has('pdname4') && $request->has('pdvalue4')) {
                array_push($labels, $request->input("pdname4"));
                $valueFour = explode(",", $request->input("pdvalue4"));
                array_push($allValues, $valueFour);
                array_push($categories, $request->input('category4'));
            }
            if ($request->has('pdname5') && $request->has('pdvalue5')) {
                array_push($labels, $request->input("pdname5"));
                $valueFive = explode(",", $request->input("pdvalue5"));
                array_push($allValues, $valueFive);
                array_push($categories, $request->input('category5'));
            }
            if ($request->has('pdname6') && $request->has('pdvalue6')) {
                array_push($labels, $request->input("pdname6"));
                $valueSix = explode(",", $request->input("pdvalue6"));
                array_push($allValues, $valueSix);
                array_push($categories, $request->input('category6'));
            }

            $product = new M_Product();
            $product = $product->updateData($request, $id);

            $productDetail = new M_Product_Detail();
            $productDetail->deleteData($id);
            $evd = new T_AD_Evd();
            $evd->deleteImage($id);
            // dd($product);
            // Log::critical("array", [$labels, $images, $allValues]);
            for ($i = 0; $i < count($labels); $i++) {
                $value = $allValues[$i];
                for ($j = 0; $j < count($value); $j++) {
                    $order = $j + 1;
                    $productDetail->insert($product, $categories[$i], $labels[$i], $order, $value[$j]);
                }
            }

            for ($x = 0; $x < count($images); $x++) {

                $path = $images[$x]->store('ProductImage');
                $evd->insertImage($path, $product);
            }
        });


        Log::channel('adminlog')->info("Product Controller", [
            'End Update Data'
        ]);

        return  redirect('productList');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
