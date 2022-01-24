<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

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

    /*
      * Create : zayar(21/1/2022)
      * Update :
      * Explain of function : To store input data  from Register page
      * Prarameter : no
      * return :
    */
    public function loginUser($sessionCustomerId)
    {
        $search = T_CU_Customer::find($sessionCustomerId)

            ->join('t_cu_customer_login', 't_cu_customer_login.customer_id', '=', 't_cu_customer.id')
            ->join('m_township', 'm_township.id', '=', 't_cu_customer.address1')
            ->join('m_states', 'm_states.id', '=', 't_cu_customer.address2')
            ->join('m_fav_type', 'm_fav_type.id', '=', 't_cu_customer.fav_type')
            // ->join('m_taste', 'm_taste.id', '=', 't_cu_customer.taste')
            ->first();
        if ($search === null) {
            return null;
        } else {
            return $search;
        }
    }
    /*
      * Create : zayar(21/1/2022)
      * Update :
      * Explain of function : To take old password
      * Prarameter : no
      * return :
    */
    public function oldPassword($id)
    {
        $admin = T_CU_Customer::find($id)
            ->join('t_cu_customer_login', 't_cu_customer_login.customer_id', '=', 't_cu_customer.id')
            ->value('password');
        return $admin;
    }
    /*
      * Create : zayar(21/1/2022)
      * Update :
      * Explain of function : To update password
      * Prarameter : no
      * return :
    */
    public function updatePassword($id, $validate)
    {
        $admin = T_CU_Customer_Login::where('customer_id', '=', $id)
            // ->join('t_cu_customer_login', 't_cu_customer_login.customer_id', '=', 't_cu_customer.id')
            ->first();
        $admin->password = $validate['newpassword'];

        $admin->save();
    }
    /*
      * Create : zayar(21/1/2022)
      * Update :
      * Explain of function : To update user profile
      * Prarameter : no
      * return :
    */
    public function updateProfile($id, $validate)
    {
        $admin = T_CU_Customer_Login::where('customer_id', '=', $id)
            // ->join('t_cu_customer_login', 't_cu_customer_login.customer_id', '=', 't_cu_customer.id')
            ->first();
        $admin->password = $validate['newpassword'];

        $admin->save();
    }
}
