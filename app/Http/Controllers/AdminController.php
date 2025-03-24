<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Complain;
class AdminController extends Controller
{
    //
    public function complain_index(){
        $complains = Complain::all();
        return view('backend.complain.index', compact('complains'));
    }

    public function complain_assigned($id){
        $complain = Complain::find($id);
        $complain->status = 1;
        $complain->save();
        return redirect()->back();
    }

    public function complain_completed($id){
        $complain = Complain::find($id);
        $complain->status = 2;
        $complain->save();
        return redirect()->back();
    }
}
