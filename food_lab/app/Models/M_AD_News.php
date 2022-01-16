<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_AD_News extends Model
{
    public $table = 'm_ad_news';

    use HasFactory;

    /*
     * Create : Min Khant(13/1/2022)
     * Update :
     * Explain of function : To show important news for users
     * Prarameter : no
     * return : news
     * */
    public function news()
    {
        return M_AD_News::where('del_flg','=','0')
            ->get();
    }
}
