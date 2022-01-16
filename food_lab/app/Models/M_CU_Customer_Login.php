<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_CU_Customer_Login extends Model
{
    public $table = 't_cu_customer_login';
    use HasFactory;

    /*
      * Create : Min Khant(15/1/2022)
      * Update :
      * Explain of function : To store input data  from Register page
      * Prarameter : no
      * return :
    */
    public function customer()
    {
        return $this->belongsTo('App\Models\T_CU_Customer');
    }
}
