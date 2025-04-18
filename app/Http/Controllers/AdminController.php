<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Complain;
use App\Models\User;
use App\Models\Bill;
use App\Models\Donation;
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

    public function index(){
        $data['total_complains'] = Complain::count();
        $data['resolved_complains'] = Complain::where('status', 2)->count();
        $data['pending_complains'] = Complain::where('status', 0)->count();
        $data['total_users'] = User::where('role', 'user')->count();
        $data['total_bills'] = Bill::sum('amount');
        $data['total_donations'] = Donation::sum('amount');
        return view('backend.index', $data);
    }

    public function vendor_index(){
        $vendors = User::where('role', 'ci')->get();
        return view('backend.vendor.index', compact('vendors'));
    }

    public function vendor_approve($id){
        $vendor = User::find($id);
        $vendor->status = 'approved';
        $vendor->save();
        return redirect()->back();
    }

    public function vendor_reject($id){
        $vendor = User::find($id);
        $vendor->status = 'pending';
        $vendor->save();
        return redirect()->back();
    }
    
    public function vendor_delete($id){
        $vendor = User::find($id);
        $vendor->delete();
        return redirect()->back();
    }
}
