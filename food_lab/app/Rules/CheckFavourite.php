<?php

namespace App\Rules;

use App\Models\FavTypeModel;
use Illuminate\Contracts\Validation\Rule;

class CheckFavourite implements Rule
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
    public function passes($attribute, $value)
    {
        $admin = FavTypeModel::where('favourite_food', '=', $value)->where('del_flg', '=', 0)->get();
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
        return 'Favourite Type already exist.';
    }
}
