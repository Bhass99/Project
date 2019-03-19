<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    public function index(){
        $events = [];
        $data = Event::all();
        foreach ($data as $value) {
            $events[] = Calendar::event(
            $value->title,
            true,
            new \DateTime($value->start_date),
            new \DateTime($value->end_date.' +1 day'),
            null,
            // Add color and link on event
            [
                'color' => '#f05050',
                'url' => 'pass here url and any route',
            ]
            );
        }
        $calendar = Calendar::addEvents($events);
        return view('pages.index');
    }
}
