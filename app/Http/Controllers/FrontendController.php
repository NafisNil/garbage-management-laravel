<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\General;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Auth;
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
        $otp = rand(1000, 9999);
        $userCount = User::count();
        $user = User::where('phone', $request->phone)->first();

        if ($user) {
            // User exists, update it
            $user->update([
                
                'otp' => $otp,
            ]);
        } else {
            // User does not exist, create a new one
            $user = User::create([
                'phone' => $request->phone,
                'email' => 'demo' . $userCount . '@gmail.com',
                'name' => 'user',
                'password' => '12345678',
                'otp' => $otp,
            ]);
        }
       // dd($user);
       Session::put('user', $user);
       return redirect()->route('otp_form');

    }

    public function otp_form(){
      //  return view()
      $user = Session::get('user');
      return view('frontend.otp-form', ['user'=>$user]);
    }

    public function otp_form_store(Request $request){
      
        $user = User::find($request->user_id);
     
        $entered_otp = $request->otp;
    
        if ($entered_otp == $user->otp) {
            $user->status = 'approved';
            $user->role = 'user';
            $user->save();
            Auth::login($user);
            return redirect()->route('registration_successful');
        }
        return redirect()->back()->with('error', 'The OTP you entered is incorrect. Please try again.');
    }

    public function registration_successful(){
       
        return view('frontend.otp_successful'); 
    }

    public function profile_update(){
        return view('frontend.profile_update');
    }

    public function vendor_registration(){
        $general = General::first();
        return view('frontend.vendor_registration',['general' => $general]);
    }

    public function vendor_registration_store(Request $request){
        $request->validate([
            'phone' => 'required|digits:11', // Adjust the validation rules as needed
            'name' => 'required',
            'email' => 'email|required',
            'area' => 'required',
        ]);
        $otp = rand(1000, 9999);
        $userCount = User::count();
        $user = User::where('phone', $request->phone)->first();

        if ($user) {
            // User exists, update it
            $user->update([
                
                'otp' => $otp,
            ]);
        } else {
            // User does not exist, create a new one
            $user = User::create([
                'phone' => $request->phone,
                'email' => $request->email,
                'name' => $request->name,
                'area' => $request->area,
                'password' => '12345678',
                'role' => 'ci',
                'status' => 'pending',
                'otp' => $otp,
            ]);
        }
       // dd($user);
       Session::put('user', $user);
       return redirect()->route('vendor_registration_successful');

    }

    public function vendor_registration_successful(){
       
        return view('frontend.vendor_registration_successful'); 
    }

    public function vendor_login(){
        return view('frontend.vendor_login');
    }

    public function vendor_login_store(Request $request){
        $request->validate([
            'phone' => 'required|digits:11', // Adjust the validation rules as needed
          
        ]);
        $user = User::where('phone', $request->phone)->first();
        if ($user) {
            if ($user->status == 'approved') {
                Session::put('user', $user);
               return redirect()->route('vendor_otp_form')->with('user', $user);
            } else {
                return redirect()->back()->with('error', 'Your account is not approved yet. Please contact support.');
            }
        } else {
            return redirect()->back()->with('error', 'No user found with this phone number.');
        }
    }

    public function vendor_otp_form(){
        $user = Session::get('user');
        return view('frontend.vendor-otp-form', ['user'=>$user]);
    }

    public function vendor_otp_form_store(Request $request){
      
        $user = User::find($request->user_id);
     
        $entered_otp = $request->otp;
    
        if ($entered_otp == $user->otp) {
           
            Auth::login($user);
            return redirect()->route('dashboard');
        }
        return redirect()->back()->with('error', 'The OTP you entered is incorrect. Please try again.');
    }
}
