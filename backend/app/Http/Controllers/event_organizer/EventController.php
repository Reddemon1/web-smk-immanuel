<?php

namespace App\Http\Controllers\event_organizer;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Participant;
use Carbon\Carbon;

class EventController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $now = Carbon::now();
        $events = Event::with('category')
        ->with('place')
        ->with('user')
        ->with('admin')
        ->get();
        
        foreach($events as $event){
            $participant = Participant::where('event_id',$event->id)->count();
            if($event->time <= $now){
                $event->status = "N";
            }else{
                $event->status = "Y";
            }
            $event->participants = $participant;
            $event->save();
        }
        return response()->json([
            'message'=>'Success Get Event',
            'data'=>$events,
        ],200);
    }

    public function indexUser(){
        $now = Carbon::now();
        $events = Event::where('start_time','>=',$now)
        ->with('category')
        ->with('place')
        ->with('user')
        ->with('admin')
        ->get();
        foreach($events as $event){
            $participant = Participant::where('event_id',$event->id)->count();
            if($event->time <= $now){
                $event->status = "N";
            }else{
                $event->status = "Y";
            }
            $event->participants = $participant;
            $event->save();
        }
        return response()->json([
            'message'=>'Success Get Event',
            'data'=>$events,
        ],200);
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
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        return response()->json([
            "message"=>"Success Show Event Detail",
            "data"=>$event
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        $event->update($request->all());
        return response()->json([
            'message'=>'Success Updating Event'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $event->delete();
        return response()->json([
            'message'=>'Success Deleting Event'
        ]);
    }
}
