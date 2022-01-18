<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\M_Fav_Type;
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
        Log::critical("mtaste" ,[$mTaste]);
        return View('admin.product.productAdd',['mFav'=>$mFav,'mTaste' => $mTaste,'active'=>6]);
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
    public function store(Request $request)
    {
        //
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
