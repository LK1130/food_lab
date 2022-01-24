<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileValidation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [
            'username' =>  ['required', 'min:4', 'max:30'],
            'phonenumber' => 'required|min:11|max:20|numeric',
            'email' => 'required|min:4|max:30'
        ];
    }
}
