<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;
use DB;
use App\Models\City;
use App\Models\Country;
use App\Models\Tag;

class SearchController extends Controller
{
    public function index()
    {
        return view('pages.search');
    }

    public function search(Request $request)
    {
        if ($request->ajax()) {

            // Input Sanitization 
            $input = preg_replace('/[^A-Za-z0-9\-]/', '', strip_tags($request->input('search')));

            if ($input) {
                $output = "";

                /* EVENTS BY NAME OR DESCRIPTIONS*/
                $events = Event::search($request->search)->take(3)->get();
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
                            $output .= '<tr>' . '<td>' . "<a href='" . route('user.show', $user->userid) . "'>" . $user->name . '</a></td>' . '<td>' .
                                $user->email . '</td>' . "<td>" . "<button onclick='ajax_addUser(" . $user->userid . "," . $request->event_id . ")" . "'style='margin-right: 25%' class='btn btn-success'> Add to Event </button>" . '</td>' . '</tr>';
                        } else {
                            $output .= '<tr>' . '<td>' . "<a href='" . route('user.show', $user->userid) . "'>" . $user->name . '</a></td>' . '<td>' .
                                $user->email . '</td>' . '<td>' . "<button onclick='ajax_remUser(" . $user->userid . "," . $request->event_id . ")" . "'style='margin-right: 25%' class='btn btn-danger'> Remove </button>" . '</td>' . '</tr>';
                        }
                    }
                    return Response($output);
                }
            }
        }
    }

    public function searchUsersAdmin(Request $request)
    {
        if ($request->ajax()) {

            if ($request->search != '') {
                $output = "";

                /* EVENTS BY NAME OR DESCRIPTIONS*/
                $users = User::query()->where('name', 'LIKE', "%{$request->search}%")->orWhere('email', 'LIKE', "%{$request->search}%")->orWhere('userid', 'LIKE', "%{$request->search}%")->take(10)->get();

                if ($users) {
                    foreach ($users as $key => $user) {
                        $output .= '<tr><td>' . $user->userid . '</td><td><a>' .
                            $user->name . '</a></td>' . '<td>' . $user->email . "</td> <td ><form method='get' action='" . route('user.show', $user->userid) . "'><button style='margin-right: 1rem' type='submit' class='btn btn-success '> View Page </button> </form> </td></tr>";
                    }
                    return Response($output);
                }
            }
        }
    }

    public function searchEventsByTag(Request $request)
    {
        // VERIFICAR SE EVENT CATEGORY EXISTE
        // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

        if ($request->category_name == "all") {
            $events = Event::where('isprivate', false)->take(24)->get();
        }
        else if ($request->category_name) {
            $tag_id = Tag::where('name', $request->category_name)->get()->first()->tagid;
            // find event that has tag
            $events = Event::where('tagid', $tag_id)->where('isprivate', false)->take(12)->get();
            // $events to json
            
        }

        return Response($events);
    }
}
