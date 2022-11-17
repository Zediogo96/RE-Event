<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\City;
use App\Models\Country;

class SearchController extends Controller
{
    public function index()
    {
        return view('pages.search');
    }


    public function search(Request $request)
    {
        if ($request->ajax()) {
            $output = "";

            /* EVENTS BY NAME OR DESCRIPTIONS*/
            $events = Event::search($request->search)->take(3)->get();
            /* EVENTS BY CITY */
            //  $test = City::search($request->search)->first();
            /* EVENTS BY COUNTRY */
            // $eventsarray = array();
            // $countries = Country::search($request->search)->first()->cities;

            // foreach ($countries as $t) {
            //     foreach ($t->events as $e) {
            //         if (sizeof($eventsarray) < 3) {
            //             array_push($eventsarray, $e);
            //         }
            //     }
            // }

            if ($events) {
                foreach ($events as $key => $event) {
                    $output .= '<tr>' . '<td>' . "<a href='" . route('event.show', $event->eventid) . "'>" . $event->name . '</a></td>' . '<td>' . $event->city->name . '</td>' . '</tr>';
                }
                return Response($output);
            }
        }
    }
}
