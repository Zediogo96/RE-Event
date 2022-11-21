<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;
use DB;
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

            if ($request->search != '') {
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

    public function searchUsers(Request $request)
    {
        if ($request->ajax()) {

            if ($request->search != '') {
                $output = "";

                /* EVENTS BY NAME OR DESCRIPTIONS*/
                $users = User::query()->where('name', 'LIKE', "%{$request->search}%")->orWhere('email', 'LIKE', "%{$request->search}%")->take(7)->get();

                if ($users) {
                    foreach ($users as $key => $user) {
                        $ticket = DB::table('ticket')->where('userid', $user->userid)->where('eventid', $request->event_id)->first();

                        // if user is not invited to event
                        if (is_null($ticket)) {
                        $output .= '<tr>' . '<td>' . "<a href='" . route('user.show', $user->userid) . "'>" . $user->name . '</a></td>' . '<td>' . $user->email . '</td>' . '<td>' . "<form method='get' action='" . route('addUser', ['eventid' => $request->event_id, 'userid' => $user->userid]) . "'><button type='submit' class='btn btn-success'> Add to Event </button> </form>" . '</td>' . '</tr>';
                        } else {
                            $output .= '<tr>' . '<td>' . "<a href='" . route('user.show', $user->userid) . "'>" . $user->name . '</a></td>' . '<td>' . $user->email . '</td>' . '<td>' . "<button class='btn btn-danger'> Remove From Event </button>" . '</td>' . '</tr>';
                        }
                    }
                    return Response($output);
                }
            }
        }
    }
}
