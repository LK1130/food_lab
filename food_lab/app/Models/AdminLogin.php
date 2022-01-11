<?php

namespace App\Models;

use App\Http\Requests\adminValidation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class AdminLogin extends Model
{
    public $table = 'm_ad_login';
    use HasFactory;
    public function AdminAdd($validate)
    {
        $admin = new AdminLogin();
        $admin->ad_name = $validate['username'];
        $admin->ad_password = $validate['password'];
        $admin->ad_role = $validate['role'];
        $admin->ad_login_dt = Carbon::now();
        $admin->save();
        $admins = AdminLogin::all();
        return view('admin.settingFolder.loginManageFolder.adminList', ['admins' => $admins]);
    }
    public function AdminList()
    {
        $admins = AdminLogin::all();
        return view('admin.settingFolder.loginManageFolder.adminList', ['admins' => $admins]);
    }
}
