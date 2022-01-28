<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\M_Site;
use App\Models\siteManage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class SiteController extends Controller
{
    public function siteManage()
    {
        Log::channel('adminlog')->info("SiteController", [
            'Start siteManage'
        ]);
        $admin = new M_Site();
        $siteInfo =  $admin->siteManage();
        Log::channel('adminlog')->info("SiteController", [
            'End siteManage'
        ]);
        return view('admin.setting.siteManage.siteManage', [
            'siteInfo' => $siteInfo
        ]);
    }
    public function store(Request $request)
    {
        Log::channel('adminlog')->info("SiteController", [
            'Start store'
        ]);
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
        Log::channel('adminlog')->info("SiteController", [
            'End store'
        ]);
        return redirect('siteManage');
    }
}
