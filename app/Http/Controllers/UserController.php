<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\General;
use App\Models\User;
use App\Models\Bill;
use Illuminate\Support\Facades\Session;
use Auth;
use Image;
use Carbon\Carbon;
class UserController extends Controller
{
    //
    public function profile_update_store(Request $request){
        $user = User::find(Auth::user()->id);
      
        $request->validate([
            'name' => 'required|max:40', // Adjust the validation rules as needed
            'city_corporation' => 'required|max:50',
            'flat' => 'required',

            'house' => 'required',
            'road' => 'required',
            'thana' => 'required'
        ]);
        $user->update($request->all());

        if ($request->hasFile('logo')) {
            @unlink('storage/'.$user->logo);
            $this->_uploadImage($request, $user);
        }

        return redirect()->route('user_dashboard');
    }

    public function user_dashboard(){
        return view('frontend.user_dashboard');
    }

    public function bill_payment_form(){
        return view('frontend.bill_payment_form');
    }

    public function bill_store(Request $request){
        $request->validate([
            'month' => 'required', // Adjust the validation rules as needed
            'year' => 'required',
            'amount' => 'required',
        
        ]);
        $bill = new Bill();
        $bill->month = $request->month;
        $bill->year = $request->year;
        $bill->amount = $request->amount;
        $bill->status = "pending";
        $bill->user_id = $request->user_id;
        $bill->save();
        Session::put('bill', $bill);
        return redirect()->route('bill_successful');
    }

    public function bill_successful(){
        $bill = Session::get('bill');
        return view('frontend.bill_successful',['bill' => $bill]);
    }


    private function _uploadImage($request, $about)
    {
        # code...
        if( $request->hasFile('logo') ) {
            $image = $request->file('logo');
            $filename = time() . '.' . $image->getClientOriginalExtension();
          
            Image::make($image)->resize(80, 80)->save('storage/' . $filename);
            $about->logo = $filename;
            $about->save();
        }

    }
}
