<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_Payment extends Model
{
    public $table = 'm_payment';
    use HasFactory;
    /*
    * Create:zayar(2022/01/15) 
    * Update: 
    * This function is used to store payment.
    */

    public function paymentAdd($validate)
    {
        $admin = new M_Payment();
        $admin->payment_name = $validate['payment_name'];
        $admin->account_name = $validate['accountname'];
        $admin->note = $validate['note'];
        $admin->save();
    }
    /*
   * Create:zayar(2022/01/15) 
   * Update: 
   * This function is used to show payment edit view.
   */

    public function paymentEditView($id)
    {
        return M_Payment::find($id);
    }
    /*
   * Create:zayar(2022/01/15) 
   * Update: 
   * This function is used to update payment.
   */
    public function paymentEdit($validate, $id)
    {
        $admin = M_Payment::find($id);
        $admin->payment_name = $validate['payment_name'];
        $admin->account_name = $validate['accountname'];
        $admin->note = $validate['note'];
        $admin->save();
    }
    /*
   * Create:zayar(2022/01/15) 
   * Update: 
   * This function is used to update del_flg to 1.
   */
    public function paymentDelete($id)
    {
        $admin = M_Payment::find($id);
        $admin->del_flg = 1;
        $admin->save();
    }
}
