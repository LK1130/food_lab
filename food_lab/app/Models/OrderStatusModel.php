<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderStatusModel extends Model
{
    public $table = 'm_order_status';
    use HasFactory;

    /*
    * Create:zayar(2022/01/15) 
    * Update: 
    * This function is used to store Order Status.
    */

    public function orderStatusAdd($validate)
    {
        $admin = new OrderStatusModel();
        $admin->status = $validate['status'];
        $admin->note = $validate['note'];
        $admin->save();
    }
    /*
    * Create:zayar(2022/01/15) 
    * Update: 
    * This function is used to show Order Status edit view.
    */

    public function orderStatusEditView($id)
    {
        return OrderStatusModel::find($id);
    }
    /*
    * Create:zayar(2022/01/15) 
    * Update: 
    * This function is used to update Order Status.
    */

    public function orderStatusEdit($validate, $id)
    {
        $admin = OrderStatusModel::find($id);
        $admin->status = $validate['status'];
        $admin->note = $validate['note'];
        $admin->save();
    }
    /*
    * Create:zayar(2022/01/15) 
    * Update: 
    * This function is used to update del_flg to 1.
    */
    public function orderStatusDelete($id)
    {
        $admin = OrderStatusModel::find($id);
        $admin->del_flg = 1;
        $admin->save();
    }
}
