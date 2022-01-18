<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Http\Requests\RangeChart;
use App\Rules\SearchDate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class T_AD_Order extends Model
{
    public $table = 't_ad_order';
    use HasFactory;

    public function orderDaily()
    {   
        Log::channel('adminlog')->info("T_AD_Order Model", [
            'Start orderDaily'
        ]);

        $currentYear = Carbon::now()->year;
        $currentMonth = Carbon::now()->month;

        $order= T_AD_Order::select(
            DB::raw('order_date as date'),
            DB::raw(('day(order_date) as day')),
            DB::raw('count(id) as totalorder'),
        )
        ->where(DB::raw('month(order_date)'), $currentMonth)
        ->where(DB::raw('year(order_date)'), $currentYear)
        ->orderBy(DB::raw('order_date'), 'ASC')
        ->groupBy('date')
        ->get();

        Log::channel('adminlog')->info("T_AD_Order Model", [
            'End orderDaily'
        ]);

        return $order;
    }
    public function orderMonthly()
    {   
        Log::channel('adminlog')->info("T_AD_Order Model", [
            'Start orderMonthly'
        ]);

        $current = Carbon::now()->year;
        $order=T_AD_Order::select(
            
            DB::raw('year(order_date) as year'),
            DB::raw('month(order_date) as month'),
            DB::raw('count(id) as totalorder'),
        )
        ->where( DB::raw('year(order_date)'),$current)
        ->groupBy('year')
        ->groupBy('month')
        ->get();

        Log::channel('adminlog')->info("T_AD_Order Model", [
            'End orderMonthly'
        ]);
        
        return $order;
    }
    public function orderYearly()
    {   
        Log::channel('adminlog')->info("T_AD_Order Model", [
            'Start orderYearly'
        ]);

        $current = Carbon::now()->year;
        $order= T_AD_Order::select(
            DB::raw('year(order_date) as year'),
            DB::raw('count(id) as totalorder'),
        )
        ->orderBy(DB::raw('year(order_date)'), 'ASC')
        ->groupBy('year')
        ->get();

        Log::channel('adminlog')->info("T_AD_Order Model", [
            'End orderYearly'
        ]);

        return $order;
    }
    public function orderRange($request)
    {    
        Log::channel('adminlog')->info("T_AD_Order Model", [
            'Start orderRange'
        ]);

        $fromDate = $request['fromDate'];
        $toDate = $request['toDate'];

        $order= T_AD_Order::select(
            DB::raw('order_date as date'),
            DB::raw('count(id) as totalorder'),
        )
        ->where(DB::raw('order_date'),'>=',$fromDate)
        ->where(DB::raw('order_date'), '<=',$toDate)
        ->orderBy(DB::raw('order_date'), 'ASC')
        ->groupBy('date')
        ->get();

        Log::channel('adminlog')->info("T_AD_Order Model", [
            'End orderRange'
        ]);

        return $order;
    }

}
