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
        $mFav = M_Fav_Type::all();
        $mTaste = M_Taste::all();
        $mrate = new M_AD_CoinRate();
        $rates = $mrate->getRate();
        Log::critical("rate", [$rates]);
        // Log::critical("mtaste", [$mTaste]);
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
            'coin' => 'required',
            'photo1' => 'required'
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
        $mFav = M_Fav_Type::all();
        $mTaste = M_Taste::all();

        $mProduct = M_Product::findOrfail($id);
        $mProductDetail = DB::select(
            DB::raw("SELECT
            m_product_detail.category,m_product_detail.label,GROUP_CONCAT(m_product_detail.value) as value
        FROM
            m_product_detail
        WHERE
            m_product_detail.product_id = $id
        GROUP BY
            m_product_detail.label")
        );
   
        $evd = DB::select(
            DB::raw("SELECT
            t_ad_evd.path
            FROM
            t_ad_evd
            WHERE
            t_ad_evd.link_id = $id")
        );

        // return $product_detail;
        return View('admin.product.productEdit', ['mFav' => $mFav, 'mTaste' => $mTaste, 'products' => $mProduct, "pdetails" => $mProductDetail,'evd' => $evd]);
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
            'photo1' => 'required'
        ]);

        DB::transaction(function () use ($request,$id) {
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
             $product->updateData($request,$id);

            $productDetail = new M_Product_Detail();
            $evd = new T_AD_Evd();
            // Log::critical("array", [$labels, $images, $allValues]);
            for ($i = 0; $i < count($labels); $i++) {
                $value = $allValues[$i];
                for ($j = 0; $j < count($value); $j++) {
                    $order = $j + 1;
                    $productDetail->updateData($id, $categories[$i], $labels[$i], $order, $value[$j]);
                }
            }

            for ($x = 0; $x < count($images); $x++) {

                $path = $images[$x]->store('ProductImage');
                $evd->updateImage($id, $path);
            }
        
        });


        Log::channel('adminlog')->info("Product Controller", [
            'End Store Data'
        ]);
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
