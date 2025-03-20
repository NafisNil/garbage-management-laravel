<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\General;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Auth;
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
        $user->update([
            'name' => $request->name,
            'city_corporation' => $request->city_corporation,
            'flat' => $request->flat,

            'house' => $request->house,
            'road' => $request->road,
            'logo' => $request->logo,
            'thana' => $request->thana
        ]);

        if ($request->hasFile('logo')) {
            @unlink('storage/'.$user->photo);
            $this->_uploadImage($request, $user);
        }

        return redirect()->route('user_dashboard');
    }

    public function user_dashboard(){
        return view('frontend.user_dashboard');
    }


    private function _uploadImage($request, $about)
    {
        # code...
        if( $request->hasFile('photo') ) {
            $image = $request->file('photo');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(80, 80)->save('storage/' . $filename);
            $about->photo = $filename;
            $about->save();
        }

    }
}
