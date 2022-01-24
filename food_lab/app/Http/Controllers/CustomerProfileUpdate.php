<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePasswordValidation;
use App\Models\T_CU_Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CustomerProfileUpdate extends Controller
{

    public function index()
    {
        Log::channel('adminlog')->info("CustomerProfileUpdate", [
            'Start index'
        ]);
        $sessionCustomerId = "qwer1234"; //need to change
        $user = new T_CU_Customer();
        $userinfo = $user->loginUser($sessionCustomerId);
        if ($userinfo === null) {
            Log::channel('adminlog')->info("CustomerProfileUpdate", [
                'End index(error)'
            ]);
            return view('errors.404');
        } else {
            Log::channel('adminlog')->info("CustomerProfileUpdate", [
                'End index'
            ]);
            return view('customer.customerProfile.updateProfile', ['user' => $userinfo]);
        }
    }


    public function update(UpdatePasswordValidation $request, $id)
    {
        Log::channel('adminlog')->info("CustomerProfileUpdate", [
            'Start update'
        ]);
        $admin = new T_CU_Customer();
        $oldPassword = $admin->oldPassword($id);
        $validate = $request->validated();
        if ($oldPassword == $validate['oldpassword']) {
            $admin = new T_CU_Customer();
            $admin->updatePassword($id, $validate);
            Log::channel('adminlog')->info("CustomerProfileUpdate", [
                'End update'
            ]);



            return redirect('updateprofile');
        } else {
            Log::channel('adminlog')->info("CustomerProfileUpdate", [
                'End update(error)'
            ]);
            return view('errors.404');
        }
    }
}
