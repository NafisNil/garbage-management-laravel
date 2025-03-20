<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\General;
use App\Models\User;
class FrontendController extends Controller
{
    //
    public function index(){
        $general = General::first();
        return view('frontend.index',['general' => $general]);
    }

    public function mobile_form(){
        $general = General::first();
        return view('frontend.mobile-form',['general' => $general]);
    }

    public function mobile_form_store(Request $request){
        $request->validate([
            'phone' => 'required|digits:11', // Adjust the validation rules as needed
        ]);
        $otp = rand(100000, 999999);
        $userCount = User::count();
        $user = User::create([
            'email' => 'demo'.$userCount.'@gmail.com',
            'name' => 'user',
            'password' => '12345678',
            'phone' => $request->phone,
            'otp' => $otp
        ]);
        dd($user);
        return view('frontend.otp-form', ['user' => $user]);

    }

    public function otp_form(){
        $general = General::first();
        return view('frontend.otp-form',['general' => $general]);
    }
}
