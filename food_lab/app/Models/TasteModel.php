<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TasteModel extends Model
{
    public $table = 'm_taste';
    use HasFactory;

    /*
    * Create:zayar(2022/01/15) 
    * Update: 
    * This function is used to store taste.
    */

    public function tasteAdd($validate)
    {
        $admin = new TasteModel();
        $admin->taste = $validate['taste'];
        $admin->note = $validate['note'];
        $admin->save();
    }
    /*
    * Create:zayar(2022/01/15) 
    * Update: 
    * This function is used to show taste edit view.
    */

    public function tasteEditView($id)
    {
        return TasteModel::find($id);
    }
    /*
    * Create:zayar(2022/01/15) 
    * Update: 
    * This function is used to update taste.
    */

    public function tasteEdit($validate, $id)
    {
        $admin = TasteModel::find($id);
        $admin->taste = $validate['taste'];
        $admin->note = $validate['note'];
        $admin->save();
    }
    /*
    * Create:zayar(2022/01/15) 
    * Update: 
    * This function is used to update del_flg to 1.
    */
    public function tasteDelete($id)
    {
        $admin = TasteModel::find($id);
        $admin->del_flg = 1;
        $admin->save();
    }
}
