<?php

namespace App\Http\Requests;

use http\Client\Request;
use Illuminate\Foundation\Http\FormRequest;

class RegisterValidation extends FormRequest
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
            'username' => 'required | min:6 | max:30',
            'phone' => 'required | max:11',
            'email' => 'required | max:128 | email',
            'addressNo' => 'required | max:11',
            'addressTownship' => 'required | max:11',
            'addressCity' => 'required | max:128',
            'password' => 'required | min:6 | max:30',
            'cPassword' => 'required | same:password'
        ];
    }
}
