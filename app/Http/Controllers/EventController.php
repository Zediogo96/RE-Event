<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\City;
use App\Models\Country;
use App\Models\Tag;
use Illuminate\Http\Request;

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
        //
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
        $event->name = $request->input('name');
        $event->description = $request->input('description');
        $event->date = $request->input('date');
        $event->capacity = $request->input('capacity');

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

        $event->price = $request->input('price');

        if (!Tag::where('name', '=', $request->input('tag'))->exists()) {
            //create a new tag and add it to the database
            $tag = new Tag;
            $tag->name = $request->input('tag');
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
}
