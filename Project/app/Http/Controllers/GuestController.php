<?php

namespace App\Http\Controllers;

use App\Guest;
use App\Volunteers;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function index($event_id)
    {
        return view('pages.guestcredentials',compact('event_id'));        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $event_id = $request->input('event_id');
        
        $volunteerId = true;
        
        if($event_id){
                
            $this->validate($request, [
                'name' => 'required',
                'last_name' => 'required',
                'email' => 'nullable',
                ]);
            
            $guest = new Guest($request->all());
            $guest->save();
            $this->validate($request, [
                
                'event_id' => 'required',
                'check' => 'nullable',
                'permission' => 'nullable',
            ]);

            $volunteer = new Volunteers($request->all() + ['guest_id' => $guest->id]);
            $volunteer->save();
            return redirect()->route('events',compact('volunteerId'))->with('success', 'Je hebt successvol een verzoek gedaan');
        }else{
            return redirect()->route('events',compact('volunteerId'))->with('failed', 'Er is iets fout gegaan, probeer het opnieuw!');

        }


        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
