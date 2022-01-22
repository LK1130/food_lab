<?php

namespace App\Models;

use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use PhpParser\Node\Expr\FuncCall;
use SebastianBergmann\Environment\Console;

class T_CU_Customer extends Model
{
    public $table ='t_cu_customer';
    use HasFactory;
    
    /*
      * Create : Zar Ni(15/1/2022)
      * Update :
      * Explain of function : To get data for DashboardCustomerMiniList
      * Prarameter : no
      * return :
    */
    public function DashboardMinicus(){

      Log::channel('adminlog')->info("T_CU_Customer Model", [
        'Start DashboardMinicus'
    ]);
        $dashboardcus = T_CU_Customer::
        limit(5)
        ->get();

        Log::channel('adminlog')->info("T_CU_Customer Model", [
          'End DashboardMinicus'
      ]);

        return $dashboardcus;
    }
    /*
      * Create : Zar Ni(15/1/2022)
      * Update :
      * Explain of function : To get data for DashboardCuctomerCount
      * Prarameter : no
      * return :
    */
    public function Dashboardcuscount(){

      Log::channel('adminlog')->info("T_CU_Customer Model", [
        'Start Dashboardcuscount'
    ]);

        $cuscount = T_CU_Customer::where('t_cu_customer.del_flg',0)
        ->count('t_cu_customer.id');

        
        Log::channel('adminlog')->info("T_CU_Customer Model", [
          'End Dashboardcuscount'
      ]);

        return $cuscount;
    }
      /*
      * Create : Zar Ni(15/1/2022)
      * Update :
      * Explain of function : To get data for DashboardCuctomerCount
      * Prarameter : no
      * return :
    */
    public function customerInfoList(){

      Log::channel('adminlog')->info("T_CU_Customer Model", [
        'Start customerInfoList'
    ]);

      $customerlist = T_CU_Customer::where('t_cu_customer.del_flg',0)
      ->paginate(10);

      Log::channel('adminlog')->info("T_CU_Customer Model", [
        'End customerInfoList'
    ]);

      return $customerlist;
    }

    /*
      * Create : Zar Ni(20/1/2022)
      * Update :
      * Explain of function : To show customer search names
      * Prarameter : no
      * return :
    */
    public function cusSearch($request){

      $cusSearch = T_CU_Customer::where('nickname','Like','%'.$request->input('nickname').'%')
      ->where('t_cu_customer.del_flg',0)
      ->get();
      
      return $cusSearch;
    }
    /*
      * Create : Zar Ni(20/1/2022)
      * Update :
      * Explain of function : To show customer id search
      * Prarameter : no
      * return :
    */
    public function cusidSearch($request){

      $cusidSearch = T_CU_Customer::where('customerID','Like','%'.$request->input('id').'%')
      ->where('t_cu_customer.del_flg',0)
      ->get();

      return $cusidSearch;
    }

    public function customerDetail($id){

  
      $cusDetail = T_CU_Customer::
      select ('*',DB::raw('t_cu_customer.id AS cid'))
      ->where('t_cu_customer.del_flg',0)
      ->where('t_cu_customer.id','=' ,$id)
      ->first();
      // Log::critical('asdasd',[$cusDetail]);
      return $cusDetail;
    }
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
