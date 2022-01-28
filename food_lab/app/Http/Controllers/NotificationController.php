<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\T_AD_Contact;
use App\Models\T_AD_Report;
use App\Models\T_AD_Suggest;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /*
   * Create:Zar Ni(2022/01/22) 
   * Update: 
   * This function is Show data of Customer Suggest List.
   */
    public function customerSuggest(){
        
        $cussuggest= new T_AD_Suggest();
        $suggest = $cussuggest->customerSuggestList();
        $sugcount = $cussuggest->suggestcount();

        $cuscontact = new T_AD_Contact();
        $conCount = $cuscontact->contactCount();

        $cusreport = new T_AD_Report();
        $rpcount = $cusreport->reportCount();
        return view('admin.suggest.customersuggest',['suggest'=>$suggest,'sugcount'=>$sugcount,'concount'=>$conCount,'rpcount'=>$rpcount]);
    }
    /*
   * Create:Zar Ni(2022/01/22) 
   * Update: 
   * This function is Show data of Customer Suggest Reply.
   */
    public function customersuggestReply(Request $request){
        // return $request;
        $sugreply = new T_AD_Suggest();
        $reply = $sugreply->suggestReply($request->input('id'));
        // return $reply;
        
        return view('admin.suggest.suggestreply',['reply'=>$reply]);
    }

    /*
   * Create:Zar Ni(2022/01/25) 
   * Update: 
   * This function is reply suggest to customer.
   */
    public function cusRpy(Request $request , $id){

        // return $request;
        // $req = $id;
        // return $req;
        $rpy = new T_AD_Suggest();
        $data = $request->input('reply');
        $rp = $rpy->sugRpy($id,$data);


        return redirect('customerSuggest');
    }

    /*
   * Create:Zar Ni(2022/01/22) 
   * Update: 
   * This function is Show data of Customer Contact List.
   */
    public function customerContact(){
        $cuscontact = new T_AD_Contact();
        $contact = $cuscontact->customerContactList();
        $conCount = $cuscontact->contactCount();

        $cussuggest= new T_AD_Suggest();
        $sugcount = $cussuggest->suggestcount();

        $cusreport = new T_AD_Report();
        $rpcount = $cusreport->reportCount();
        return view('admin.contact.customercontact',['contact'=>$contact,'sugcount'=>$sugcount,'concount'=>$conCount,'rpcount'=>$rpcount]);
    }

    /*
   * Create:Zar Ni(2022/01/25) 
   * Update: 
   * This function is to show Cotact Detail of Customer.
   */
    public function customercontactReply(Request $request){
        $conreply=new T_AD_Contact();
        $reply = $conreply->contactReply($request->input('id'));

        return view('admin.contact.contactreply',['reply'=>$reply]);
    }

    /*
   * Create:Zar Ni(2022/01/25) 
   * Update: 
   * This function is reply to customer.
   */
    public function contrpy(Request $request , $id){

        $rpy = new T_AD_Contact();
        $data = $request->input('reply');
        $rp = $rpy->cuscontactrp($id,$data);

        return redirect('customerContact');
    }

     /*
   * Create:Zar Ni(2022/01/22) 
   * Update: 
   * This function is Show data of Customer Report List.
   */
    public function customerReport(){
        $cusreport = new T_AD_Report();
        $report = $cusreport->customerReportlist();
        $rpcount = $cusreport->reportCount();

        $cussuggest= new T_AD_Suggest();
        $sugcount = $cussuggest->suggestcount();

        $cuscontact = new T_AD_Contact();
        $conCount = $cuscontact->contactCount();
        return view('admin.report.customerreport',['report'=>$report ,'rpcount'=>$rpcount,'sugcount'=>$sugcount,'concount'=>$conCount]);
    }

     /*
   * Create:Zar Ni(2022/01/25) 
   * Update: 
   * This function is for Reply Customer Report.
   */
    public function customerreportReply(Request $request){
        $rpreport = new T_AD_Report();
        $reply = $rpreport->cusreportReply($request->input('id'));

        return view('admin.report.reportreply',['reply'=>$reply]);
    }

     /*
   * Create:Zar Ni(2022/01/25) 
   * Update: 
   * This function is reply to customer.
   */
    public function reportRp(Request $request,$id){

        $replyrp =new T_AD_Report();
        $rpdata = $request->input('reply');
        $rep = $replyrp->repRpy($id ,$rpdata);

        return redirect('customerReport');
    }
}
