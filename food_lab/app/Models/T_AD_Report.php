<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class T_AD_Report extends Model
{
    public $table = 't_ad_report';
    use HasFactory;


     /*
   * Create:Zar Ni(2022/01/22) 
   * Update: 
   * This function is Show data of Customer Report List.
   */
    public function customerReportlist(){

        Log::channel('adminlog')->info("T_AD_Report Model", [
            'Start customerReportlist'
        ]);

        $reportlist = T_AD_Report::
        select('*',DB::raw('t_ad_report.id AS ID'))
        ->join('t_cu_customer','t_cu_customer.id','=','t_ad_report.customer_id')
        ->join('t_ad_order','t_ad_order.id','=','t_ad_report.order_id')
        ->where('t_ad_report.del_flg',0)
        ->get();

        Log::channel('adminlog')->info("T_AD_Report Model", [
            'End customerReportlist'
        ]);

        return $reportlist;
    }

    /*
   * Create:Zar Ni(2022/01/22) 
   * Update: 
   * This function is Show data of Customer Report Count.
   */
    public function reportCount(){

        Log::channel('adminlog')->info("T_AD_Report Model", [
            'Start reportCount'
        ]);

        $rpcount = T_AD_Report::
        where('t_ad_report.reply',null)
        ->where('t_ad_report.del_flg',0)
        ->count('t_ad_report.id');

        Log::channel('adminlog')->info("T_AD_Report Model", [
            'End reportCount'
        ]);

        return $rpcount;
    }

     /*
   * Create:Zar Ni(2022/01/22) 
   * Update: 
   * This function is Show data of Customer Report Reply.
   */
    public function cusreportReply($id){

        Log::channel('adminlog')->info("T_AD_Report Model", [
            'Start cusreportReply'
        ]);

        $rplist = T_AD_Report::
        select('*',DB::raw('t_ad_report.id AS ID'))
        ->join('t_cu_customer','t_cu_customer.id','=','t_ad_report.customer_id')
        ->where('t_ad_report.id','=',$id)
        ->where('t_ad_report.del_flg',0)
        ->first();

        Log::channel('adminlog')->info("T_AD_Report Model", [
            'End cusreportReply'
        ]);

        return $rplist;
    }

     /*
   * Create:Zar Ni(2022/01/25) 
   * Update: 
   * This function is for reply to customer.
   */
    public function repRpy($id,$request){

        Log::channel('adminlog')->info("T_AD_Report Model", [
            'Start repRpy'
        ]);

        $rpreply = T_AD_Report::where('id',$id)
        ->update(['reply'=>$request]);

        Log::channel('adminlog')->info("T_AD_Report Model", [
            'End repRpy'
        ]);

        return $rpreply;
    }
    public function customerreportMail($id){
        $cusreport = T_AD_Report::select('customer_id')
        ->where('id',$id)
        ->first();
        return $cusreport;
    }
    /*
     * Create : Min Khant(13/1/2022)
     * Update :
     * Explain of function : To store customer report data
     * Prarameter : no
     * return : 
     * */
    public function customerReport($request)
    {
        Log::channel('customerlog')->info('T_AD_Report Model', [
            'start customerReport'
        ]);

        $report = new T_AD_Report();
        $report->order_id = $request['order'];
        $report->report_message = $request['message'];
        $report->save();

        Log::channel('customerlog')->info('T_AD_Report Model', [
            'end customerReport'
        ]);
    }
}
