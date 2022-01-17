<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_Township extends Model
{
    public $table = 'm_township';
    use HasFactory;
    /*
    * Create:zayar(2022/01/15) 
    * Update: 
    * This function is used to store township.
    */

    public function townshipAdd($validate)
    {
        $admin = new M_Township();
        $admin->township_name = $validate['township_name'];
        $admin->delivery_price = $validate['dlprice'];
        $admin->note = $validate['note'];
        $admin->save();
    }
    /*
   * Create:zayar(2022/01/15) 
   * Update: 
   * This function is used to show township edit view.
   */

    public function townshipEditView($id)
    {
        return M_Township::find($id);
    }
    /*
   * Create:zayar(2022/01/15) 
   * Update: 
   * This function is used to update township.
   */

    public function townshipEdit($validate, $id)
    {
        $admin = M_Township::find($id);
        $admin->township_name = $validate['township_name'];
        $admin->delivery_price = $validate['dlprice'];
        $admin->note = $validate['note'];
        $admin->save();
    }
    /*
   * Create:zayar(2022/01/15) 
   * Update: 
   * This function is used to update del_flg to 1.
   */
    public function townshipDelete($id)
    {
        $admin = M_Township::find($id);
        $admin->del_flg = 1;
        $admin->save();
    }
}
