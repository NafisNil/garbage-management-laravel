<?php

namespace App\Http\Controllers;

use App\Http\Requests\DonationRequest;
use Illuminate\Http\Request;
use App\Models\General;
use App\Models\User;
use App\Models\Bill;
use App\Models\Schedule;
use App\Models\Complain;
use Illuminate\Support\Facades\Session;
use Auth;
use Image;
use App\Models\Organization;
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

    public function donate_payment_form(){
        $organizations = Organization::all();
        return view('frontend.donate_payment_form',['organizations' => $organizations]);
    }



    public function donation_successful(){
        $donation = Session::get('donation');
        return view('frontend.donation_successful',['donation' => $donation]);
    }

    public function weekly_schedule(){
        $schedules = Schedule::latest()->get();
        return view('frontend.weekly_schedule',['schedule' => $schedules]);
    }

    public function complain_first(){
        return view('frontend.complain_first');
    }

    public function complain_store(Request $request){
        $request->validate([
            'waste_type' => 'required', // Adjust the validation rules as needed
        ]);
        $complain = new Complain();
        $complain->waste_type = $request->waste_type;
        $complain->status = "0";
        $complain->user_id = $request->user_id;
        $complain->save();
        Session::put('complain', $complain);
        return redirect()->route('complain_second');
    }

    public function complain_second(){
        $complain = Session::get('complain');
        return view('frontend.complain_second',['complain' => $complain]);
    }

    public function complain_update(Request $request){
        $complain = Complain::find($request->complain_id);
      
        $complain->update($request->all());
        if ($request->hasFile('logo')) {
            @unlink('storage/'.$complain->logo);
            $this->_uploadImageComplain($request, $complain);
        }
        Session::put('complain', $complain);
        return redirect()->route('complain_successful');
    }

    public function complain_successful(){
        $complain = Session::get('complain');
        return view('frontend.complain_successful',['complain' => $complain]);
    }

    public function complain_track($id){
        $complains = Complain::where('id', $id)->first();
        return view('frontend.complain_track',['complain' => $complains]);
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



    private function _uploadImageComplain($request, $about)
    {
        # code...
        if( $request->hasFile('logo') ) {
            $image = $request->file('logo');
            $filename = time() . '.' . $image->getClientOriginalExtension();
          
            Image::make($image)->resize(600, 400)->save('storage/' . $filename);
            $about->logo = $filename;
            $about->save();
        }

    }
}
