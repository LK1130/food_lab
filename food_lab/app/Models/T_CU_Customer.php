<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class T_CU_Customer extends Model
{
    public $table = 't_cu_customer';
    use HasFactory;

    /*
      * Create : Min Khant(15/1/2022)
      * Update :
      * Explain of function : To store input data  from Register page
      * Prarameter : no
      * return :
    */
    public  function customerData($data)
    {
        //insert customer
        $customer = new T_CU_Customer();
        $customer->customerID = 'Min 123';
        $customer->nickname = $data['username'];
        $customer->phone = $data['phone'];
        $customer->address1 = $data['addressNo'];
        $customer->address2 = $data['addressTownship'];
        $customer->address3 = $data['addressCity'];
        $customer->save();

        //insert customerLogin
        $customerLogin = new M_CU_Customer_Login();
        $customerLogin->email = $data['email'];
        $customerLogin->password = $data['password'];
        $customerLogin->customer_id =  $customer->id;
        $customerLogin->verify_code = '1234';
        $customerLogin->save();

        // $customer->customerLogin()->save($customerLogin);
    }

    public function customerLogin()
    {
        return $this->hasOne('App\Models\M_CU_Customer_Login');
    }
}
