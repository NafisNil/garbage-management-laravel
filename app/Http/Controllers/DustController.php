<?php

namespace App\Http\Controllers;

use App\Models\Dust;
use Illuminate\Http\Request;
use App\Http\Requests\DustRequest;
class DustController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $dust = Dust::orderBy('id', 'desc')->get();
        return view('backend.dust.index',['dust'=>$dust]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('backend.dust.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DustRequest $request)
    {
        //
        $dust = Dust::create([
            'name' => $request->name
        ]);
        return redirect()->route('dust.index')->with('success','Data inserted successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Dust $dust)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dust $dust)
    {
        //
        return view('backend.dust.edit',[
            'edit' => $dust
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DustRequest $request, Dust $dust)
    {
        //
        $dust->update([
            'name' => $request->name
        ]);
        return redirect()->route('dust.index')->with('success','Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dust $dust)
    {
        //
        $dust->delete();
        return redirect()->route('dust.index')->with('success','Data deleted successfully');
    }
}
