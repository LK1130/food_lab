<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\M_Fav_Type;
use App\Models\M_State;
use App\Models\M_Taste;
use App\Models\M_Township;
use App\Models\T_CU_Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CustomerProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Log::channel('adminlog')->info("CustomerProfileController", [
            'Start index'
        ]);
        $sessionCustomerId = session()->get('customerId');
        $user = new T_CU_Customer();
        $userinfo = $user->loginUser($sessionCustomerId);

        $mTownship = new M_Township();
        $townshipnames = $mTownship->townshipDetails();

        $mstate = new M_State();
        $staenames = $mstate->stateName();

        if ($userinfo === null) {
            Log::channel('adminlog')->info("CustomerProfileController", [
                'End index(error)'
            ]);
            return view('errors.404');
        } else {
            Log::channel('adminlog')->info("CustomerProfileController", [
                'End index'
            ]);
            $taste = new M_Taste();
            $tastes = $taste->allTastes();
            $type = new M_Fav_Type();
            $types = $type->allType();
            return view('customer.customerProfile.editProfile', [
                'user' => $userinfo,
                'tastes' => $tastes,
                'types' => $types,
                'townships' => $townshipnames,
                'states' => $staenames
            ]);
        }
    }


    public function update(Request $request, $id)
    {
        //
    }
}
