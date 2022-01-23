<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

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

    /*
     * Create : Min Khant(22/1/2022)
     * Update :
     * Explain of function : to store data from suggest form
     * Prarameter : no
     * return : 
     * */
    public function customerSuggest($request)
    {
        Log::channel('customerlog')->info('T_AD_Suggest Model', [
            'start customerSuggest'
        ]);
        // $suggest = T_AD_Suggest::create([
        //     'suggest_type' => $request->input('type'),
        //     'message' => $request->input('details')
        // ]);

        $suggest = new T_AD_Suggest();
        $suggest->suggest_type = $request['type'];
        $suggest->message = $request['details'];
        $suggest->save();

        Log::channel('customerlog')->info('T_AD_Suggest Model', [
            'end customerSuggest'
        ]);
    }
}
