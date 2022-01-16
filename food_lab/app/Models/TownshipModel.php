<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TownshipModel extends Model
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
        $admin = new TownshipModel();
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
        return TownshipModel::find($id);
    }
    /*
    * Create:zayar(2022/01/15) 
    * Update: 
    * This function is used to update township.
    */

    public function townshipEdit($validate, $id)
    {
        $admin = TownshipModel::find($id);
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
        $admin = TownshipModel::find($id);
        $admin->del_flg = 1;
        $admin->save();
    }
}
