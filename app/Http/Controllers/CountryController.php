<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\User;

/*testing 
use App\Models\Event;
use App\Models\User;
use App\Models\Tag;
use App\Models\Comment;
use App\Models\Report;
*/

use App\Models\Event;
use App\Models\City;
use App\Models\Ticket;

use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*
        $test = Comment::find(1)->reports; 
        print_r($test);
        die();
        */
        
  /*city event search working
        $city_search = 'Coimbra';
        //$test = City::search($city_search)->get()->map->only(['cityid', 'name']);
        $test = City::search($city_search)->first();
        dd($test->events);
*/
/*country event search working
        $eventsarray = array();

        $country_search = 'Portugal';
        $test = Country::search($country_search)->first()->cities;

        foreach ($test as $t) {
            foreach ($t->events as $e) {
                array_push($eventsarray, $e);
            }
            //array_push($eventsarray, $t->events);
            //print_r($t->events);
        }

        dd($eventsarray);
*/
/*title event search working 
        $title = 'F1';
        $events = Event::search($title)->get();
        dd($events);
*/

/*$events = Event::all();
dd($events);*/
/* 
        $tickets = Ticket::all();
        dd($tickets) */;

        // $usertest = Event::find(8);
        // dd($usertest->participants);

        //$eventHosts = EventHost::all();
        //dd($eventHosts);

$users = User::where('userid', '>', 45)->get();
dd($users);

        $countries = Country::all();
        return view('layouts.countries', ['countries' => $countries]);
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
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Country $country)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        //
    }
}
