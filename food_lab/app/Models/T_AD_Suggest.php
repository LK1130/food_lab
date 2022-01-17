<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class T_AD_Suggest extends Model
{
    public $table = 't_ad_suggest';
    use HasFactory;
    /*
    * Create:zayar(2022/01/15) 
    * Update: 
    * This function is used to store suggest.
    */

    public function suggestAdd($validate)
    {
        $admin = new T_AD_Suggest();
        $admin->suggest_type = $validate['suggest_type'];
        $admin->note = $validate['note'];
        $admin->save();
    }
    /*
   * Create:zayar(2022/01/15) 
   * Update: 
   * This function is used to show suggest edit view.
   */

    public function suggestEditView($id)
    {
        return T_AD_Suggest::find($id);
    }
    /*
   * Create:zayar(2022/01/15) 
   * Update: 
   * This function is used to update suggest.
   */

    public function suggestEdit($validate, $id)
    {
        $admin = T_AD_Suggest::find($id);
        $admin->suggest_type = $validate['suggest_type'];
        $admin->note = $validate['note'];
        $admin->save();
    }
    /*
   * Create:zayar(2022/01/15) 
   * Update: 
   * This function is used to update del_flg to 1.
   */
    public function suggestDelete($id)
    {
        $admin = T_AD_Suggest::find($id);
        $admin->del_flg = 1;
        $admin->save();
    }
}
