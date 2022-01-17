<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_Decison_Status extends Model
{
    public $table = 'm_decision_status';
    use HasFactory;
    /*
    * Create:zayar(2022/01/15) 
    * Update: 
    * This function is used to store Decision.
    */

    public function decisionStatusAdd($validate)
    {
        $admin = new M_Decison_Status();
        $admin->status = $validate['status'];
        $admin->note = $validate['note'];
        $admin->save();
    }
    /*
   * Create:zayar(2022/01/15) 
   * Update: 
   * This function is used to show Decision edit view.
   */

    public function decisionStatusEditView($id)
    {
        return M_Decison_Status::find($id);
    }
    /*
   * Create:zayar(2022/01/15) 
   * Update: 
   * This function is used to update Decision.
   */

    public function decisionStatusEdit($validate, $id)
    {
        $admin = M_Decison_Status::find($id);
        $admin->status = $validate['status'];
        $admin->note = $validate['note'];
        $admin->save();
    }
    /*
   * Create:zayar(2022/01/15) 
   * Update: 
   * This function is used to update del_flg to 1.
   */
    public function decisionStatusDelete($id)
    {
        $admin = M_Decison_Status::find($id);
        $admin->del_flg = 1;
        $admin->save();
    }
}
