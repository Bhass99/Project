<?php

namespace App\Http\Controllers;

use App\Event;
use App\Volunteers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;

class EventsController extends Controller
{
    public function index(){
        $events = [];
        $data = Event::all();
        $emplNeed = Event::paginate(2);
        $emplWork = Event::paginate(10);

        // caledar setup 
        foreach ($data as $row) {
            $events[] = Calendar::event(
            $row->title,
            false,
            new \DateTime($row->start_date),
            new \DateTime($row->end_date),
            $row->id,
            [
                'color' => $row->color,
                // 'url' => 
            ]
            );
        }
        $calendar = Calendar::addEvents($events)->setOptions([ 
            'firstDay' => 1,
            'selectable' => true,
            'contentHeight' => 450,
            'columnHeader' => false,
            'aspectRatio' => 1,
            'editable' => true,
        ])->setCallbacks([
            'eventClick' => 'function() {
                showModal();
            }'
        ]); 

        // check if user has volunteerd so that the user cant volunteer twice to the same date
        if(!Auth::guest()){
            $userId = Auth::user()->id;
            $volunteerId = Volunteers::
                where('user_id',$userId)
                ->get()->count();
        }
        // $volunteerEvent_id = Volunteers::pluck('event_id');
    //    dd($volunteerEvent_id);
        

        return view('pages.index', compact('calendar','events','emplNeed','emplWork','userId','volunteerId'));
    }
    public function create(){
        return view('pages.addEvent');
    }
    public function store(Request $request){
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'color' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date', 
        ]);

        $event = new Event();
        $event->title = $request->input('title');
        $event->color = $request->input('color');
        $event->start_date = $request->input('start_date');
        $event->end_date = $request->input('end_date');

        $event->save();
        return redirect()->route('events')->with('success', 'Er is een nieuw datum toegevoegd');
    }

    public function show(){
        $events = Event::all();
        return view('pages.displayEvents',compact('events'));
    }
    // show the volunteers who work to the admin
     public function volunteers(){
        $volunteers = volunteers::all();
        // $eventStart = Event::where('event_id',)
        // $test = $volunteers->events();
        dd(Event::where('id')->geT());
        return view('pages.volunteers',compact('volunteers'));
    }
    public function edit($id){
        $event = Event::find($id);
        return view('pages.editEvent', compact('event'));
    }
     public function update(Request $request,$id){
         $this->validate($request, [
            'title' => 'required|string|max:255',
            'color' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date', 
        ]);
        
        $events = Event::find($id);
        $events->title = $request->input('title');
        $events->color = $request->input('color');
        $events->start_date = $request->input('start_date');
        $events->end_date = $request->input('end_date');

        $events->save();
        return redirect()->route('events')->with('success', 'Event is gewijzigd');
     }

    public function delete($id){
        $event = Event::find($id);
        $event->delete();
        return redirect()->route('displayEvents')->with('success', 'Event is verwijderd');
    }
}
