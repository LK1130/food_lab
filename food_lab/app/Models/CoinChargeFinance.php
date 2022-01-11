<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoinChargeFinance extends Model
{   
    public $table = 't_ad_coincharge_finance';
    use HasFactory;
    public function coinChargeFinance()
    {
        return CoinChargeFinance::all();
    }
}
