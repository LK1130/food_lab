<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class M_AD_Login extends Model
{
    public $table = 'm_ad_login';
    use HasFactory;
    /*
    * Create:zayar(2022/01/11) 
    * Update: 
    * This is method is used to save admin in database.
    * $validate is validated user request.
    * $admin is AdminLogin model.
    * $admins is all admin from database.
    * Return is view (adminList.blade.php).
    */
    public function AdminAdd($validate)
    {
        $admin = new M_AD_Login();
        $admin->ad_name = $validate['username'];
        $admin->ad_password = $validate['password'];
        $admin->ad_role = $validate['role'];
        $admin->ad_login_dt = Carbon::now();
        $admin->save();
    }
    /*
   * Create:zayar(2022/01/11) 
   * Update: 
   * This is method is used to show admin form database in table.
   * $admins is all admin from database.
   * Return is view (adminList.blade.php).
   */
    public function AdminList()
    {
        return M_AD_Login::where('del_flg', '=', 0)->paginate(3);
    }
    /*
   * Create:zayar(2022/01/11) 
   * Update: 
   * This method is used to show user clicked admin form database.
   * $id is admin id.
   * $admins is admin from database which match with $id.
   * Return is view (adminList.blade.php).
   */
    public function AdminDetail($id)
    {
        return M_AD_Login::find($id);
    }
    /*
   * Create:zayar(2022/01/11) 
   * Update: 
   * This is method is used to show Admin Edit View.
   * $id is admin id.
   * Return is view (adminList.blade.php).
   */
    public function AdminEdit($id)
    {
        return M_AD_Login::find($id);
    }
    /*
   * Create:zayar(2022/01/11) 
   * Update: 
   * This is method is used to update Admin informations.
   * $id is admin id.
   * $validate is validated user request.
   * Return is view (adminList.blade.php).
   */
    public function AdminUpdate($validate, $id)
    {
        $admin = M_AD_Login::find($id);
        $admin->ad_name = $validate['username'];
        $admin->ad_password = $validate['password'];
        $admin->ad_role = $validate['role'];
        $admin->save();
    }
    /*
   * Create:zayar(2022/01/11) 
   * Update: 
   * This is method is used to update del_flg.
   * $id is admin id.
   * Return is view (adminList.blade.php).
   */
    public function AdminDelete($id)
    {
        $admin = M_AD_Login::find($id);
        $admin->del_flg = 1;
        $admin->save();
    }
}
