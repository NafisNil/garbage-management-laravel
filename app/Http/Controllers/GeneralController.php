<?php

namespace App\Http\Controllers;

use App\Models\General;
use Illuminate\Http\Request;
use Image;
use App\Http\Requests\GeneralRequest;
class GeneralController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $general = General::orderBy('id', 'desc')->first();
        $generalCount = General::count();

        return view('backend.general.index',['general'=>$general, 'generalCount' => $generalCount]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('backend.general.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GeneralRequest $request)
    {
        //
        $general = General::create($request->all());
        if ($request->hasFile('logo')) {
            $this->_uploadImage($request, $general);
        }

        if ($request->hasFile('slider_logo')) {
            $this->_uploadImage($request, $general);
        }

        return redirect()->route('general.index')->with('success','Data inserted successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(General $general)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(General $general)
    {
        //
        return view('backend.general.edit',[
            'edit' => $general
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GeneralRequest $request, General $general)
    {
        //
       
        $general->update($request->all());
        if ($request->hasFile('logo')) {
            @unlink('storage/'.$general->logo);
            $this->_uploadImage($request, $general);
        }

        if ($request->hasFile('slider_logo')) {
            @unlink('storage/'.$general->slider_logo);
            $this->_uploadImage($request, $general);
        }
        return redirect()->route('general.index')->with('success','Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(General $general)
    {
        //
        $general->delete();
        if(!empty($general->logo));
        @unlink('storage/'.$general->logo);
        if(!empty($general->slider_logo));
        @unlink('storage/'.$general->slider_logo);
        return redirect()->route('general.index')->with('status','Data deleted successfully!');
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

        if( $request->hasFile('slider_logo') ) {
            $image = $request->file('slider_logo');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(1200, 400)->save('storage/' . $filename);
            $about->slider_logo = $filename;
            $about->save();
        }

    }
}
