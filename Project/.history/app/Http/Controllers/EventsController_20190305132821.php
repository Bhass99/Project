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
            true,
            new \DateTime($row->start_date),
            new \DateTime($row->end_date),
            $row->id,
            [
                'color' => '#f05050',
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

    }
}