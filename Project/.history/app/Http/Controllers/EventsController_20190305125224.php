<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

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
            new \DateTime($row->end_date.' +1 day'),
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
