<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerLogin extends Model
{
    public $table = 't_cu_customer_login';
    public $fillable = ['email', 'password', 'verify_code'];
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
        return $this->belongsTo('App\Models\Customer');
    }
}
