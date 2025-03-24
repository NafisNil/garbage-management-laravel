<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;
use App\Http\Requests\ScheduleRequest;
use App\Models\Organization;
use Carbon\Carbon;
class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $schedule = Schedule::orderBy('id', 'desc')->get();
        return view('backend.schedule.index',['schedule'=>$schedule]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $organization = Organization::all();
        return view('backend.schedule.create', ['organization' => $organization]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ScheduleRequest $request)
    {
        //
        $schedule = Schedule::create([
            'day' => $request->day,
            'time' => $request->time,
            'date' => $request->date,
            'status' => $request->status,
            'organization_id' => $request->organization_id,
        ]);
        return redirect()->route('schedule.index')->with('success','Data inserted successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Schedule $schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Schedule $schedule)
    {
        //
        $organization = Organization::all();
        return view('backend.schedule.edit',[
            'edit' => $schedule,
            'organization' => $organization
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ScheduleRequest $request, Schedule $schedule)
    {
        //
        $schedule->update([
            'day' => $request->day,
            'time' => $request->time,
            'date' => $request->date,
            'status' => $request->status,
            'organization_id' => $request->organization_id,
        ]);
        return redirect()->route('schedule.index')->with('success','Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Schedule $schedule)
    {
        //
        $schedule->delete();
        return redirect()->route('schedule.index')->with('status','Data deleted successfully!');
    }
}
