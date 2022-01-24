<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_Fav_Type extends Model
{
  public $table = 'm_fav_type';
  use HasFactory;
  /*
    * Create:zayar(2022/01/15) 
    * Update: 
    * This function is used to store Favourite Type.
    */

  public function favTypeAdd($validate)
  {
    $admin = new M_Fav_Type();
    $admin->favourite_food = $validate['favourite_food'];
    $admin->note = $validate['note'];
    $admin->save();
  }
  /*
  * Create:zayar(2022/01/15) 
  * Update: 
  * This function is used to show Favourite Type edit view.
  */

  public function favTypeEditView($id)
  {
    return M_Fav_Type::find($id);
  }
  /*
  * Create:zayar(2022/01/15) 
  * Update: 
  * This function is used to update Favourite Type.
  */

  public function favTypeEdit($validate, $id)
  {
    $admin = M_Fav_Type::find($id);
    $admin->favourite_food = $validate['favourite_food'];
    $admin->note = $validate['note'];
    $admin->save();
  }
  /*
  * Create:zayar(2022/01/15) 
  * Update: 
  * This function is used to update del_flg to 1.
  */
  public function favTypeDelete($id)
  {
    $admin = M_Fav_Type::find($id);
    $admin->del_flg = 1;
    $admin->save();
  }
  /*
   * Create:zayar(2022/01/15) 
   * Update: 
   * This function is used to get all favourite type.
   */

  public function allType()
  {
    return M_Fav_Type::where('del_flg', '=', 0)->get();
  }
}
