<?php

namespace App\Rules;

use App\Models\AdminLogin;
use Illuminate\Contracts\Validation\Rule;

class CheckName implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    /*
    * Create:zayar(2022/01/10) 
    * Update: 
    * This is function is used to check if requested username is already in the database or not .
    * $value is for user input name.
    * Return is false when there is the same in the database and return true when there is no same name in the database. 
    */
    public function passes($attribute, $value)
    {
        $admin = AdminLogin::where('ad_name', '=', $value)->get();
        if (count($admin) > 0) {
            return false;
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Username already taken.';
    }
}
