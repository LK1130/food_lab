<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function dashboardList(){
        $customer = DB::table('t_cu_customer')
        ->paginate(5);

        return view('admin.dashboard',['t_cu_customer'=>$customer]);
    }

    public function coinchargeList(){
        return view('admin.transactions.coinchargeList');
    }
    public function orderTransaction(){
        return view('admin.transactions.orderTransaction');
    }
}
