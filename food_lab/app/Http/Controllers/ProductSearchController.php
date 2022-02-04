<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\M_Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductSearchController extends Controller
{
    


    public function searchByCategory(Request $request){

        Log::channel('adminlog')->info("Product Search Controller", [
            'Start search by type'
        ]);

        $products = new M_Product();
        $product  = $products->searchByType($request->input('type'));
        if($product == null) abort(404);
        // dd($product);

        Log::channel('adminlog')->info("Product Search Controller", [
            'End search by type'
        ]);

        return response()
        ->json(
        $product
        );
    }


    public function searchByTaste(Request $request){

        Log::channel('adminlog')->info("ProductSearchController", [
            'Start search by taste'
        ]);

        $products = new M_Product();
        $product  = $products->searchByTaste($request->input('type'));
        if($product == null) abort(404);
        

        Log::channel('adminlog')->info("ProductSearchController", [
            'End search by taste'
        ]);

        return response()
        ->json(
        $product
        );
    }
}
