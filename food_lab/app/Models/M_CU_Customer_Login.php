<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_CU_Customer_Login extends Model
{
    public $table = 'm_cu_customer_login';
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

    /*
      * Create : Min Khant(16/1/2022)
      * Update :
      * Explain of function : To update verify code
      * Prarameter : no
      * return :
    */
    public function updateVerifyCode($key)
    {
        M_CU_Customer_Login::where('verify_code', $key)
        ->update(['verify' => 1]);

        return true;
    }

    /*
      * Create : Min Khant(16/1/2022)
      * Update :
      * Explain of function : To unique mail
      * Prarameter : no
      * return :
    */
    public function checkMail($mail)
    {
        $hasMail = M_CU_Customer_Login::where('email', $mail)
        ->get();

        return $hasMail;
    }

    public function loginMail($mail)
    {
        $correct = M_CU_Customer_Login::where('email','=',$mail)
                    ->get();
        return $correct;
    }

    public function loginPassword($mail,$pwd)
    {
        $correct = M_CU_Customer_Login::where('email','=',$mail)
                    ->where('password','=',md5(sha1($pwd)))
                    ->get();
        return $correct;
    }

}
