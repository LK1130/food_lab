<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\RangeChart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class T_AD_CoinCharge_Finance extends Model
{   
    public $table = 't_ad_coincharge_finance';
    use HasFactory;

    public function coinDaily()
    {
        Log::channel('adminlog')->info("T_AD_CoinCharge_Finance Model", [
            'Start lcoinDaily'
          ]);

        $currentYear = Carbon::now()->year;
        $currentMonth = Carbon::now()->month;

        $coin= T_AD_CoinCharge_Finance::select(
            DB::raw(('day(created_at) as day')),
            DB::raw('sum(amount) as totalAmount'),
        )
        ->where(DB::raw('month(created_at)'), $currentMonth)
        ->where(DB::raw('year(created_at)'), $currentYear)
        ->orderBy(DB::raw('created_at'), 'ASC')
        ->groupBy('day')
        ->get();

        Log::channel('adminlog')->info("T_AD_CoinCharge_Finance Model", [
            'End coinDaily'
        ]);

        return $coin;
    }
    public function coinMonthly()
    {
        Log::channel('adminlog')->info("T_AD_CoinCharge_Finance Model", [
            'Start coinMonthly'
          ]);
        $current = Carbon::now()->year;
        $coin= T_AD_CoinCharge_Finance::select(
            DB::raw('year(created_at) as year'),
            DB::raw('month(created_at) as month'),
            DB::raw('sum(amount) as totalAmount'),
        )
        ->where( DB::raw('year(created_at)'),$current)
        ->groupBy('year')
        ->groupBy('month')
        ->get();

        Log::channel('adminlog')->info("T_AD_CoinCharge_Finance Model", [
            'End coinMonthly'
        ]);

        return $coin;
    }
    public function coinYearly()
    {
        Log::channel('adminlog')->info("T_AD_CoinCharge_Finance Model", [
            'Start coinYearly'
          ]);

        $coin= T_AD_CoinCharge_Finance::select(
                DB::raw('year(created_at) as year'),
                DB::raw('sum(amount) as totalAmount'),
            )
            ->orderBy(DB::raw('year(created_at)'), 'ASC')
            ->groupBy('year')
            ->get();

        Log::channel('adminlog')->info("T_AD_CoinCharge_Finance Model", [
            'End coinYearly'
        ]);

        return $coin;
    }
    public function coinRange($request)
    {
        Log::channel('adminlog')->info("T_AD_CoinCharge_Finance Model", [
            'Start coinRange'
          ]);

        $fromDate = $request['fromDate'];
        $toDate = $request['toDate'];

        $coin= T_AD_CoinCharge_Finance::select(
            DB::raw('date(created_at) as date '),
            DB::raw('sum(amount) as totalAmount'),
        )
        ->where(DB::raw('date(created_at)'), '>=',$fromDate)
        ->where(DB::raw('date(created_at)'), '<=',$toDate)
        ->orderBy(DB::raw('created_at'), 'ASC')
        ->groupBy('date')
        ->get();

        Log::channel('adminlog')->info("T_AD_CoinCharge_Finance Model", [
            'End coinRange'
        ]);
        return $coin;
    }
}
