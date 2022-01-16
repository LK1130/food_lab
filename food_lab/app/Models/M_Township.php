<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_Township extends Model
{
    public $table = 'm_township';

    use HasFactory;

    /*
     * Create : Min Khant(13/1/2022)
     * Update :
     * Explain of function : To get Township name in m_township Table From Database
     * Prarameter : no
     * return : Township names and each delivery prices
     * */
    public function townshipDetails()
    {
        return M_Township::where('del_flg','=','0')
            ->get();
    }
}

