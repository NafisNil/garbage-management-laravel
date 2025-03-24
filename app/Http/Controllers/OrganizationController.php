<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use Illuminate\Http\Request;
use App\Http\Requests\OrganizationRequest;
use Illuminate\Container\Attributes\Auth;
class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $organization = Organization::orderBy('id', 'desc')->get();
        return view('backend.organization.index',['organization'=>$organization]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('backend.organization.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrganizationRequest $request)
    {
        //
        $organization = Organization::create($request->all());
       
        return redirect()->route('organization.index')->with('success','Data inserted successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Organization $organization)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Organization $organization)
    {
        //
        return view('backend.organization.edit',[
            'edit' => $organization
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OrganizationRequest $request, Organization $organization)
    {
        //
        $organization->update($request->all());
       
        return redirect()->route('organization.index')->with('success','Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Organization $organization)
    {
        //
        $organization->delete();
       
        return redirect()->route('organization.index')->with('status','Data deleted successfully!');
    }
}
