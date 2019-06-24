<?php

namespace App\Http\Controllers;

use App\User;
use App\Event;
use App\Guest;
use Carbon\Carbon;
use App\Volunteers;
use App\Mail\RefuseEmail;
use App\Jobs\userReminder;
use App\Mail\ConfirmEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class VolunteerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $volunteers = volunteers::orderBy('id', 'DESC')->paginate(10);

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
        $volunteer = Volunteers::find($id);
        $user = User::find($volunteer->user_id);
        $event = Event::find($volunteer->event_id);
        $guest = Guest::find($volunteer->guest_id);
        $today = date('Y-m-d H:s:i');
        $timeSec = strtotime($event->start_date) - strtotime($today) - 86400;
        
        if ($user === NULL) {
            Mail::to($guest->email)->send(new ConfirmEmail($guest,$event,$user));
            if($timeSec > 0){
                dispatch(new userReminder($user,$event,$guest))
                ->delay($timeSec);
            }
        }elseif($guest === NULL){
            Mail::to($user->email)->send(new ConfirmEmail($user,$event,$guest));
            if($timeSec > 0){
                dispatch(new userReminder($user,$event,$guest))
                ->delay($timeSec);
            }
        }else{
            return false;
        }
       
        $volunteer->permission = true;
        $volunteer->check = false;
        $volunteer->save();
        return redirect()->route('volunteer.index')->with('success', 'Je hebt successvol een vrijwilliger geaccepteerd');
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

    public function refuse(Request $request, $id){
        $volunteer = Volunteers::find($id);
        $user = User::find($volunteer->user_id);
        $event = Event::find($volunteer->event_id);
        $guest = Guest::find($volunteer->guest_id);

        if ($user === NULL) {
            Mail::to($guest->email)->send(new RefuseEmail($guest,$event,$user));
        }elseif($guest === NULL){
            Mail::to($user->email)->send(new RefuseEmail($user,$event,$guest));
        }else{
            return false;
        }


        $volunteer->permission = false;
        $volunteer->check = false;
        $volunteer->save();
        return redirect()->route('volunteer.index')->with('success', 'Je hebt successvol een vrijwilliger geweigerd');
    }

}
