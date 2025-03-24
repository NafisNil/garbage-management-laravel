<?php

namespace App\Http\Controllers;

use App\Models\Truck;
use Illuminate\Http\Request;
use App\Http\Requests\TruckRequest;
class TruckController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $truck = Truck::orderBy('id', 'desc')->get();
        return view('backend.truck.index',['truck'=>$truck]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('backend.truck.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TruckRequest $request)
    {
        //
        $truckCount = Truck::count();
        $rand = rand(1000,9999);

        $truck = Truck::create([
            'name' => $request->name,
            'uid' => "CC".$truckCount.$rand,
            'area' => $request->area,
        ]);
        return redirect()->route('truck.index')->with('success','Data inserted successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Truck $truck)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Truck $truck)
    {
        //
        return view('backend.truck.edit',[
            'edit' => $truck
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(truckRequest $request, Truck $truck)
    {
        //
        $truck->update($request->all());
       
        return redirect()->route('truck.index')->with('success','Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Truck $truck)
    {
        //
        $truck->delete();
       
        return redirect()->route('truck.index')->with('status','Data deleted successfully!');
    }
}
