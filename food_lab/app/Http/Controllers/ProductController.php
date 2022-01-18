<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\M_Fav_Type;
use App\Models\M_Product;
use App\Models\M_Product_Detail;
use App\Models\M_Taste;
use Illuminate\Http\Request;
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
    * return 
    * */

    public function index()
    {
        $mFav = M_Fav_Type::all();
        $mTaste = M_Taste::all();
        Log::critical("mtaste", [$mTaste]);
        return View('admin.product.productAdd', ['mFav' => $mFav, 'mTaste' => $mTaste, 'active' => 6]);
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
    * parament : Proudct field name type taste coin amount description and avaliable
    * return : data from request
    * */
    public function store(Request $request)
    {

        $labels = [];
        $categories = [];
        $valueOne = [];
        $valueTwo = [];
        $valueThree = [];
        $valueFour = [];
        $valueFive = [];
        $valueSix = [];

        $allValues = [];

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

        for ($i = 0; $i < count($labels); $i++) {
            $value = $allValues[$i];
            for ($j = 0; $j < count($value); $j++) {
                $order = $j + 1;
                $productDetail->insert($finalProduct, $categories[$i], $labels[$i], $order, $value[$j]);
            }
        }
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
        //
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
        //
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
