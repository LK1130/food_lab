<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdNews extends Model
{
    use HasFactory;

    public $table = 'm_ad_news';

    public function news()
    {
        return AdNews::where('del_flg', '=', '0')
            ->get();
    }
}
