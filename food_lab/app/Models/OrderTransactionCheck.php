<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderTransactionCheck extends Model
{
    public $table = 't_ad_order';
    use HasFactory;
    public function orderTransaction()
    {
        return OrderTransactionCheck::all();
    }

   
}
