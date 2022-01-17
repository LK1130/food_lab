<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_News_Category extends Model
{
    public $table = 'm_news_category';
    use HasFactory;
    /*
    * Create:zayar(2022/01/15) 
    * Update: 
    * This function is used to store category.
    */

    public function categoryAdd($validate)
    {
        $admin = new M_News_Category();
        $admin->category_name = $validate['category_name'];
        $admin->note = $validate['note'];
        $admin->save();
    }
    /*
   * Create:zayar(2022/01/15) 
   * Update: 
   * This function is used to show category edit view.
   */

    public function categoryEditView($id)
    {
        return M_News_Category::find($id);
    }
    /*
   * Create:zayar(2022/01/15) 
   * Update: 
   * This function is used to update category.
   */

    public function categoryEdit($validate, $id)
    {
        $admin = M_News_Category::find($id);
        $admin->category_name = $validate['category_name'];
        $admin->note = $validate['note'];
        $admin->save();
    }
    /*
   * Create:zayar(2022/01/15) 
   * Update: 
   * This function is used to update del_flg to 1.
   */
    public function categoryDelete($id)
    {
        $admin = M_News_Category::find($id);
        $admin->del_flg = 1;
        $admin->save();
    }
}
