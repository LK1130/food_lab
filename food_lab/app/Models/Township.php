<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Township extends Model
{
    public $table = 'm_township';

    use HasFactory;

    public function townshipDetails()
    {
        return Township::all();
    }
}
