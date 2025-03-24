<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;
use App\Http\Requests\DonationRequest;
use Illuminate\Support\Facades\Session;
class DonationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $donation = Donation::orderBy('id', 'desc')->get();
        return view('backend.donation.index',['donation'=>$donation]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DonationRequest $request)
    {
        //
        $donation = Donation::create([
            'amount' => $request->amount,
            'organization_id' => $request->organization_id,
            'user_id' => $request->user_id,
            'status' => 'pending'
        ]);
        Session::put('donation', $donation);
        return redirect()->route('donation_successful')->with('success','Donation  sent successfully');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Donation $donation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Donation $donation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Donation $donation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Donation $donation)
    {
        //
    }
}
