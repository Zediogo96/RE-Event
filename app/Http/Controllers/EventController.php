<?php

namespace App\Http\Controllers;

use DB;

use App\Models\Event;
use App\Models\City;
use App\Models\Country;
use App\Models\Tag;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();
        return view('layouts.events', ['events' => $events]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('pages.createEvent');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $event = new Event;

        if (!is_null($request->input('name'))) {
            $event->name = $request->input('name');
        }
        
        $event->description = $request->input('description');

        if (!is_null($request->input('date'))) {
            $event->date = $request->input('date');
        }

        if (($request->input('capacity')) > 0) {
            $event->capacity = $request->input('capacity');
        }

        if (!City::where('name', '=', $request->input('city'))->exists()) {  

            $city = new City;
            $city->name = $request->input('city');

            if (!Country::where('name', '=', $request->input('country'))->exists()) {
                $country = new Country;
                $country->name = $request->input('country');
                $country->save();
            }

            $city->countryid = Country::where('name', $request->input('country'))->first()->countryid;
            $city->save();
        }
        
        $event->cityid = City::where('name', '=', $request->input('city'))->first()->cityid;

        if (!is_null($request->input('address'))) {
            $event->address = $request->input('address');
        }

        /*         if (($request->input('price')) >= 0) {
            $event->price = $request->input('price');
        } */

        if (($request->input('price')) >= 0) {
            $event->price = $request->input('price');
        }

        if (!Tag::where('name', '=', $request->input('tag'))->exists()) {
            $tag = new Tag;
            $tag->name = $request->input('tag');
            $tag->symbol = 'UDF';
            $tag->save();
        }

        $event->tagid = Tag::where('name', '=', $request->input('tag'))->first()->tagid;

        //dd($request->input('isprivate'));

        $event->isprivate = $request->input('isprivate');

        if (is_null($request->input('isprivate'))) {
            $event->isprivate = false;
        } else {
            $event->isprivate = true;
        }

        //$event->isprivate = false;  //for testing - implement switch later

        if ($request->hasFile('img')) {
            $file = $request->file('img');

            $photo = new Photo;

            $evid = $results = DB::select( DB::raw("SELECT MAX(eventid) FROM event"))[0]->max;
            $evid = $evid + 1;

            $filename = "$evid".'.'.$file->getClientOriginalExtension();
            $file -> move(public_path('/event_photos'), $filename);

            $photo->path = 'event_photos/'."$evid".'.jpg';
            $photo->eventid = $event->id;
            $photo->save();
        }

        //dd($event);

        $event->save();
        return redirect('/event'.$event->eventid);
    }

    /**
     * Display the specified resource.
     * * @param  \App\Models\Event  $event
     * * @return \Illuminate\Http\Response
     * 
     * *********************************************
     * CHANGE THIS TO BE DYNAMIC, SHOULD RECEIVE AN eventID AND DISPLAY THAT ONE
     * *********************************************
     */
    public function show($id)
    {
        $event = Event::find($id);
        return view('pages.event', ['event' => $event]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::find($id);
        return view('pages.editEvent', ['event' => $event]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $event = Event::find($request->input('eventid'));

        if (!is_null($request->input('name'))) {
            $event->name = $request->input('name');
        }

        if (!is_null($request->input('description'))) {
            $event->description = $request->input('description');
        }

        if (!is_null($request->input('date'))) {
            $event->date = $request->input('date');
        }

        if (!is_null($request->input('capacity'))) {
            $event->capacity = $request->input('capacity');
        }
        

        //City::find(City::where('name', $request->input('city'))->first()) == null  if antigo

        if (!City::where('name', '=', $request->input('city'))->exists()) {  //se nao existir a cidade

            //create a new city and country and add it to the database
            $city = new City;
            $city->name = $request->input('city');

            //Country::find(Country::where('name', $request->input('country'))->first()) == null  if antigo

            if (!Country::where('name', '=', $request->input('country'))->exists()) {
                $country = new Country;
                $country->name = $request->input('country');
                $country->save();
            }

            $city->countryid = Country::where('name', $request->input('country'))->first()->countryid;

            $city->save();
        }

        $cityexistsid = City::where('name', '=', $request->input('city'))->first()->cityid;

        //$event->cityid = City::where('name', $request->input('city'))->first()->cityid; 
        //$event->cityid = 1; 
        $event->cityid = $cityexistsid;

        if (!is_null($request->input('price'))) {
            $event->price = $request->input('price');
        }
        
        if (!Tag::where('name', '=', $request->input('tag'))->exists()) {
            //create a new tag and add it to the database
            $tag = new Tag;
            $tag->name = $request->input('tag');
            $tag->symbol = 'UDF';
            $tag->save();
        }

        $tagexistsid = Tag::where('name', '=', $request->input('tag'))->first()->tagid;

        $event->tagid = $tagexistsid;

        //$event->tagid = 7;

        $event->save();
        return redirect('/event' . $event->eventid);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
    }

    public function join($event_id)
    {
        if (!Auth::check()) return redirect('/login');
        $event = Event::find($event_id);
        $this->authorize('join', $event);
        $user = Auth::user();
        $event->participants()->attach($user->userID);
        return redirect('event' . $event->eventID);
    }

}
