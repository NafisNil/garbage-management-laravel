<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Image;
use App\Http\Requests\EventRequest;
use Carbon\Carbon;
class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $event = Event::orderBy('id', 'desc')->get();
        return view('backend.event.index',['event'=>$event]);
    }

    public function all_event()
    {
        //
        $event = Event::orderBy('id', 'desc')->take(6)->get();
        return view('frontend.event',['event'=>$event]);
    }

    public function single_event($id)
    {
        //
        $event = Event::find($id);
        return view('frontend.single_event',['event'=>$event]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('backend.event.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EventRequest $request)
    {
        //
        $event = Event::create($request->all());
        if ($request->hasFile('logo')) {
            $this->_uploadImage($request, $event);
        }
        return redirect()->route('event.index')->with('success','Data inserted successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        //
        return view('backend.event.edit',[
            'edit' => $event
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EventRequest $request, Event $event)
    {
        //
        $event->update($request->all());
        if ($request->hasFile('logo')) {
            @unlink('storage/'.$event->logo);
            $this->_uploadImage($request, $event);
        }

        return redirect()->route('event.index')->with('success','Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        //
        $event->delete();
        if(!empty($event->logo));
        @unlink('storage/'.$event->logo);

        return redirect()->route('event.index')->with('status','Data deleted successfully!');
    }


    private function _uploadImage($request, $about)
    {
        # code...
        if( $request->hasFile('logo') ) {
            $image = $request->file('logo');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(1000, 400)->save('storage/' . $filename);
            $about->logo = $filename;
            $about->save();
        }

    }
}
