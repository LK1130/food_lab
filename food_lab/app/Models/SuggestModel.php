<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuggestModel extends Model
{
    public $table = 'm_suggest';
    use HasFactory;

    /*
    * Create:zayar(2022/01/15) 
    * Update: 
    * This function is used to store suggest.
    */

    public function suggestAdd($validate)
    {
        $admin = new SuggestModel();
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
        return SuggestModel::find($id);
    }
    /*
    * Create:zayar(2022/01/15) 
    * Update: 
    * This function is used to update suggest.
    */

    public function suggestEdit($validate, $id)
    {
        $admin = SuggestModel::find($id);
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
        $admin = SuggestModel::find($id);
        $admin->del_flg = 1;
        $admin->save();
    }
}
