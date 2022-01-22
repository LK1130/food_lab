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
  public $table = 't_cu_customer';
  use HasFactory;

  /*
      * Create : Zar Ni(15/1/2022)
      * Update :
      * Explain of function : To get data for DashboardCustomerMiniList
      * Prarameter : no
      * return :
    */
  public function DashboardMinicus()
  {

    Log::channel('adminlog')->info("T_CU_Customer Model", [
      'Start DashboardMinicus'
    ]);
    $dashboardcus = T_CU_Customer::limit(5)
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
  public function Dashboardcuscount()
  {

    Log::channel('adminlog')->info("T_CU_Customer Model", [
      'Start Dashboardcuscount'
    ]);

    $cuscount = T_CU_Customer::where('t_cu_customer.del_flg', 0)
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
    /*
      * Create : Zar Ni(20/1/2022)
      * Update :
      * Explain of function : To show customer id search
      * Prarameter : no
      * return :
    */
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
      * Explain of function : To generate customer Id
      * Prarameter : user info
      * return : customer id
    */
  private function generatCustomerId($data)
  {
    Log::channel('customerlog')->info('T_CU_Customer Model', [
      'start generatCustomerId'
    ]);

    //for generate customer id
    $firstStr = substr($data['username'], 0, 1);
    $lastStr = substr($data['username'], -1);
    $firstemail = substr($data['email'], 0, 1);
    $firstPwd = substr($data['password'], 0, 1);
    $lastPwd = substr($data['password'], -1);
    $day = date('d');
    $hour = date('h');

    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!#$%&';
    $generateKey = '';
    for ($i = 0; $i < 3; $i++) {
      $charLength = rand(0, strlen($characters) - 1);
      $generateKey .= $characters[$charLength];
    }
  }
    /*

    $customerId = "$firstStr$lastStr$firstemail$firstPwd$lastPwd$day$hour$generateKey";

    Log::channel('customerlog')->info('T_CU_Customer Model', [
      'end generatCustomerId'
    ]);

    return $customerId;
  }

  /*
      * Create : Min Khant(15/1/2022)
      * Update :
      * Explain of function : To store input data  from Register page
      * Prarameter : no
      * return :
    */
  public  function customerData($data, $key)
  {
    Log::channel('customerlog')->info('T_CU_Customer Model', [
      'start customerData'
    ]);

    $customerId = $this->generatCustomerId($data);

    DB::transaction(function () use ($customerId, $data, $key) {
      //insert customer
      $customer = new T_CU_Customer();
      $customer->customerID = $customerId;
      $customer->nickname = $data['username'];
      $customer->phone = $data['phone'];
      $customer->address1 = $data['addressNo'];
      $customer->address2 = $data['addressTownship'];
      $customer->address3 = $data['addressCity'];
      // $customer->fav_type = 'something';
      // $customer->taste = $data['taste'];
      // $customer->allergic = $data['note'];
      $customer->save();

      //insert customerLogin
      $customerLogin = new M_CU_Customer_Login();
      $customerLogin->email = $data['email'];
      $customerLogin->password = md5(sha1($data['password']));
      $customerLogin->customer_id =  $customer->id;
      $customerLogin->verify_code = $key;
      $customerLogin->save();

      // $customer->customerLogin()->save($customerLogin);
    });

    Log::channel('customerlog')->info('T_CU_Customer Model', [
      'end customerData'
    ]);
    return true;
  }


  /*
      * Create : Min Khant(19/1/2022)
      * Update :
      * Explain of function : To store input data  from google register
      * Prarameter : no
      * return :
    */
  //    public function googleRegister($data)
  //    {
  //        Log::channel('customerlog')->info('T_CU_Customer Model',[
  //            'start googleRegister'
  //        ]);
  //
  //        $custmerID = $this->generatCustomerId($data);
  //
  //        DB::transcation(function () use($data,$custmerID){
  //           $customer = new T_CU_Customer();
  //           $customer->customerID = $custmerID;
  //           $customer->nickname = $data['name'];
  //           $customer->save();
  //
  //           $customerLogin = new M_CU_Customer_Login();
  //           $customerLogin->email = $data['email'];
  //           $customerLogin->password = 12345;
  //           $customerLogin->customer_id =  $customer->id;
  //           $customerLogin->verify_code = 'no need';
  //           $customerLogin->save();
  //        });
  //
  //        Log::channel('customerlog')->info('T_CU_Customer Model',[
  //            'end googleRegister'
  //        ]);
  //
  //    }


  public function customerLogin()
  {
    return $this->hasOne('App\Models\M_CU_Customer_Login');
  }

}