<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
            /*
    * Create:Zarni(2022/01/12) 
    * Update: 
    * This is function is to show admin ordertransactionDetail
    * Return is view (ordertransactionDetail.php)
    */
    public function ordertransactionDetail(){
        return view('admin.transactions.ordertransactionDetail');
    }
}
