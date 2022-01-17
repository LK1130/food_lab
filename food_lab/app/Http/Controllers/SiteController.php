<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\M_Site;
use App\Models\siteManage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SiteController extends Controller
{
    public function siteManage()
    {
        $admin = new M_Site();
        $siteInfo =  $admin->siteManage();
        $townships =  $admin->township();
        $payments =  $admin->payments();
        $categories =  $admin->categories();
        $tastes =  $admin->tastes();
        $suggests =  $admin->suggests();
        $favtypes =  $admin->favtypes();
        $orderStatus =  $admin->orderStatus();
        $desicions =  $admin->desicions();
        $news =  $admin->news();
        return view('admin.setting.siteManage.siteManage', [
            'siteInfo' => $siteInfo,
            'townships' => $townships,
            'payments' => $payments,
            'categories' => $categories,
            'tastes' => $tastes,
            'suggests' => $suggests,
            'favtypes' => $favtypes,
            'orderstatus' => $orderStatus,
            'decisions' => $desicions,
            'news' => $news,
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:0|max:15',
            'policy' => 'required|min:10|max:255',
            'maintenance' => 'required|numeric|min:1|max:1'
        ]);
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $file->storeAs('siteLogo', $file->getClientOriginalName());
        } else {
            echo "File Not Received";
        }
        $logo = $request->file('logo');
        $siteLogo = $logo->getClientOriginalName();
        $admin = new M_Site();
        $admin->saveSiteUpdate($request, $siteLogo);
        return redirect('siteManage');
    }
}
