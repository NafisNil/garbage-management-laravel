<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Bill;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class VendorController extends Controller
{
    //
    public function bill_index(){
        $bill = Bill::where('vendor_id', Auth::user()->id)->get();
        return view('backend.vendor.bill.index', compact('bill'));
    }

    public function bill_create(){
        return view('backend.vendor.bill.create');
    }

    public function bill_store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'mobile' => 'required|string|max:15',
            'email' => 'nullable|email|max:255',
            'city_corporation' => 'required|string|max:255',
            'thana' => 'required|string|max:255',
            'ward' => 'required|string|max:255',
            'road' => 'required|string|max:255',
            'house' => 'required|string|max:255',
            'flat' => 'nullable|string|max:255',
            'month' => 'required|string',
            'year' => 'required|integer',
            'amount' => 'required|numeric',
        ]);

        // Save user information in the users table
        $user = User::updateOrCreate(
            ['phone' => $request->mobile], // Use mobile as a unique identifier
            [
                'name' => $request->name,
                'email' => $request->email,
                'city_corporation' => $request->city_corporation,
                'thana' => $request->thana,
                'ward' => $request->ward,
                'road' => $request->road,
                'house' => $request->house,
                'flat' => $request->flat,
                'password' => Hash::make('12345678'), // Generate a random password,
                'role' => 'user', // Set the role to 'user'
                'status' => 'active', // Set the status to 'active'
            ]
        );

        // Save bill information in the bills table
        Bill::create([
            'month' => $request->month,
            'year' => $request->year,
            'amount' => $request->amount,
            'vendor_id' => Auth::user()->id,
           'status'=>'success',
            'user_id' => $user->id, // Associate the bill with the user
        ]);

        return redirect()->route('vendor.bill.index')->with('success', 'Bill and user information saved successfully.');
    }

    public function bill_edit($id)
    {
        $bill = Bill::findOrFail($id);
        $user = $bill->user; // Retrieve the associated user

        return view('backend.vendor.bill.edit', [
            'edit' => $bill,
            'user' => $user, // Pass the user data to the view
        ]);
    }

    public function bill_update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'mobile' => 'required|string|max:15',
            'email' => 'nullable|email|max:255',
            'city_corporation' => 'required|string|max:255',
            'thana' => 'required|string|max:255',
            'ward' => 'required|string|max:255',
            'road' => 'required|string|max:255',
            'house' => 'required|string|max:255',
            'flat' => 'nullable|string|max:255',
            'month' => 'required|string',
            'year' => 'required|integer',
            'amount' => 'required|numeric',
        ]);

        // Update user information
        $bill = Bill::findOrFail($id);
        $user = $bill->user;
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'city_corporation' => $request->city_corporation,
            'thana' => $request->thana,
            'ward' => $request->ward,
            'road' => $request->road,
            'house' => $request->house,
            'flat' => $request->flat,
        ]);

        // Update bill information
        $bill->update([
            'month' => $request->month,
            'year' => $request->year,
            'amount' => $request->amount,
        ]);

        return redirect()->route('vendor.bill.index')->with('success', 'Bill and user information updated successfully.');
    }

    public function bill_destroy($id)
    {
        $bill = Bill::findOrFail($id);
     
        // Delete the bill and the associated user
        $bill->delete();
     

        return redirect()->route('vendor.bill.index')->with('success', 'Bill and user information deleted successfully.');
    }
}
