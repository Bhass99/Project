<?php

namespace App\Http\Controllers;

use App\Volunteers;
use Illuminate\Http\Request;

class VolunteerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $volunteers = volunteers::all();
        return view('pages.volunteers',compact('volunteers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required',
            'event_id' => 'required',
            'check' => 'nullable',
            'permission' => 'nullable',
        ]);

        $volunteer = new Volunteers($request->all());

        $volunteer->save();
        return redirect()->route('events')->with('success', 'Je hebt successvol een verzoek gedaan');

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
        // $volunteer = Volunteers::find($id);
        // $volunteer->permission = true;
        // $volunteer->check = false;
        // $volunteer->save();
        // return redirect()->route('events')->with('success', 'Je hebt successvol een vrijwilliger geaccepteerd');
        return 123;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $volunteerDel = Volunteers::find($id);
        $volunteerDel->delete();
        return redirect()->route('volunteer.index')->with('success', 'U hebt successvol vrijwilliger verwijderd');
    }
}
