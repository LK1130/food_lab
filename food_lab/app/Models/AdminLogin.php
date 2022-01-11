<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminLogin extends Model
{
    public $table = 'doctor_lists';
    use HasFactory;
    public function AdminAdd()
    {
        return AdminLogin::all();
    }
}
