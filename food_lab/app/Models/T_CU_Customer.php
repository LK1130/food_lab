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
  public function customerInfoList()
  {

    Log::channel('adminlog')->info("T_CU_Customer Model", [
      'Start customerInfoList'
    ]);

    $customerlist = T_CU_Customer::where('t_cu_customer.del_flg', 0)
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
  public function cusSearch($request)
  {
    
      Log::channel('adminlog')->info("T_CU_Customer Model", [
        'Start cusSearch'
    ]);

      $cusSearch = T_CU_Customer::where('nickname','Like','%'.$request->input('nickname').'%')
      ->where('t_cu_customer.del_flg',0)
      ->get();
      
      return $cusSearch;

      Log::channel('adminlog')->info("T_CU_Customer Model", [
        'End cusSearch'
    ]);
    }
    /*
      * Create : Zar Ni(20/1/2022)
      * Update :
      * Explain of function : To show customer id search
      * Prarameter : no
      * return :
    */
    public function cusidSearch($request){
      
      Log::channel('adminlog')->info("T_CU_Customer Model", [
        'Start cusidSearch'
    ]);

    $cusidSearch = T_CU_Customer::where('customerID', 'Like', '%' . $request->input('id') . '%')
      ->where('t_cu_customer.del_flg', 0)
      ->get();

      return $cusidSearch;

      Log::channel('adminlog')->info("T_CU_Customer Model", [
        'End cusidSearch'
      ]);
    }
    /*
      * Create : Zar Ni(20/1/2022)
      * Update :
      * Explain of function : To show customer id search
      * Prarameter : no
      * return :
    */
    public function customerDetail($id){

      Log::channel('adminlog')->info("T_CU_Customer Model", [
        'Start customerDetail'
      ]);

      $cusDetail = T_CU_Customer::
      select ('*',DB::raw('t_cu_customer.id AS cid'))
      ->where('t_cu_customer.del_flg',0)
      ->where('t_cu_customer.id','=' ,$id)
      ->first();
      // Log::critical('asdasd',[$cusDetail]);
      return $cusDetail;

      Log::channel('adminlog')->info("T_CU_Customer Model", [
        'End customerDetail'
      ]);
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

    $customerId = $firstStr . $lastStr . $firstemail . $firstPwd . $lastPwd . $day . $hour . $generateKey;

    if ($data->has('type') && $data->has('taste') && $data->has('note')) {
      DB::transaction(function () use ($customerId, $data, $key) {
        //insert customer
        $customer = new T_CU_Customer();
        $customer->customerID = $customerId;
        $customer->nickname = $data['username'];
        $customer->phone = $data['phone'];
        $customer->address1 = $data['addressNo'];
        $customer->address2 = $data['addressState'];
        $customer->address3 = $data['addressTownship'];
        $customer->fav_type = $data['type'];
        $customer->taste = $data['taste'];
        $customer->allergic = $data['note'];
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
    } else {
      DB::transaction(function () use ($customerId, $data, $key) {
        //insert customer
        $customer = new T_CU_Customer();
        $customer->customerID = $customerId;
        $customer->nickname = $data['username'];
        $customer->phone = $data['phone'];
        $customer->address1 = $data['addressNo'];
        $customer->address2 = $data['addressState'];
        $customer->address3 = $data['addressTownship'];
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
    }

    Log::channel('customerlog')->info('T_CU_Customer Model', [
      'end customerData'
    ]);
    return true;
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
    Log::channel('adminlog')->info("T_CU_Customer Model", [
      'Start loginUser'
    ]);
    Log::channel('adminlog')->info("ok", [
      $sessionCustomerId
    ]);
    $search = T_CU_Customer::select('*', DB::raw('t_cu_customer.id AS cid'))
      ->where('t_cu_customer.id', '=', $sessionCustomerId)

      ->join('m_cu_customer_login', 'm_cu_customer_login.id', '=', 't_cu_customer.id')
      ->join('m_township', 'm_township.id', '=', 't_cu_customer.address1')
      ->join('m_state', 'm_state.id', '=', 't_cu_customer.address2')
      // ->join('m_fav_type', 'm_fav_type.id', '=', 't_cu_customer.fav_type')
      // ->join('m_taste', 'm_taste.id', '=', 't_cu_customer.taste')
      ->first();
    if ($search === null) {
      Log::channel('adminlog')->info("T_CU_Customer Model", [
        'End loginUser'
      ]);
      return null;
    } else {
      Log::channel('adminlog')->info("T_CU_Customer Model", [
        'End loginUser'
      ]);
      Log::channel('adminlog')->info("T_CU_Customer Model", [
        $search
      ]);
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
    Log::channel('adminlog')->info("T_CU_Customer Model", [
      'Start oldPassword'
    ]);
    Log::channel('adminlog')->info("T_CU_Customer Model", [
      $id
    ]);
    $admin = M_CU_Customer_Login::where('customer_id', '=', $id)
      ->where('del_flg', '=', 0)
      ->first();
    if ($admin == null) {
      abort(500);
    }
    Log::channel('adminlog')->info("T_CU_Customer Model", [
      'End oldPassword'
    ]);
    return $admin->password;
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
    Log::channel('adminlog')->info("T_CU_Customer Model", [
      'Start updatePassword'
    ]);
    $admin = T_CU_Customer_Login::where('customer_id', '=', $id)
      // ->join('m_cu_customer_login', 'm_cu_customer_login.customer_id', '=', 't_cu_customer.id')
      ->first();
    $admin->password = $validate['newpassword'];

    $admin->save();
    Log::channel('adminlog')->info("T_CU_Customer Model", [
      'End updatePassword'
    ]);
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
    Log::channel('adminlog')->info("T_CU_Customer Model", [
      'Start updateProfile'
    ]);
    $admin = T_CU_Customer_Login::where('customer_id', '=', $id)
      // ->join('m_cu_customer_login', 'm_cu_customer_login.customer_id', '=', 't_cu_customer.id')
      ->first();
    $admin->password = $validate['newpassword'];

    $admin->save();
    Log::channel('adminlog')->info("T_CU_Customer Model", [
      'End updateProfile'
    ]);
  }
}
