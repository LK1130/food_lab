<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class T_CU_Customer extends Model
{
    public $table ='t_cu_customer';
    use HasFactory;
    

    public function DashboardMinicus(){
        $dashboardcus = T_CU_Customer::
        limit(5)
        ->get();
        
        return $dashboardcus;
    }

    public function Dashboardcuscount(){
        $cuscount = T_CU_Customer::where('t_cu_customer.del_flg',0)
        ->count('t_cu_customer.id');

        return $cuscount;
    }
}
