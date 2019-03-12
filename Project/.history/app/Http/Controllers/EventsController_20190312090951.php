<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;

class EventsController extends Controller
{
    public function index(){
        $events = [];
        $data = Event::all();
        foreach ($data as $row) {
            $events[] = Calendar::event(
            $row->title,
            false,
            new \DateTime($row->start_date),
            new \DateTime($row->end_date),
            $row->id,
            [
                'color' => $row->color,
                // 'url' => 'pass here url and any route',
            ]
            );
        }
        $calendar = Calendar::addEvents($events);
        return view('pages.index', compact('calendar','events'));
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
        
        // $events = Event::find($id);
        // $events->title = $request->input('title');
        // $events->color = $request->input('color');
        // $events->start_date = $request->input('start_date');
        // $events->end_date = $request->input('end_date');

        // $events->save();
        // return redirect()->route('events')->with('success', 'Event is gewijzigd');
            return 123;
     }
}
