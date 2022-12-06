<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;
use DB;
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

                /* EVENTS BY NAME OR DESCRIPTIONS*/
                $users = User::query()->where('name', 'LIKE', "%{$request->search}%")->orWhere('email', 'LIKE', "%{$request->search}%")->take(7)->get();

                if ($users) {
                    foreach ($users as $key => $user) {
                        $ticket = DB::table('ticket')->where('userid', $user->userid)->where('eventid', $request->event_id)->first();
                        // if user is not invited to event
                        (is_null($ticket)) ? ($user->attending_event = false) : ($user->attending_event = true);
                    }
                    return Response($users);
                }
            }
        }
    }

    public function searchUsersAdmin(Request $request)
    {
        if ($request->ajax()) {

            if ($request->search != '') {

                /* EVENTS BY NAME OR DESCRIPTIONS*/
                $users = User::query()->where('name', 'LIKE', "%{$request->search}%")->orWhere('email', 'LIKE', "%{$request->search}%")->orWhere('userid', 'LIKE', "%{$request->search}%")->take(10)->get();

                if ($users) {
                    return Response($users);
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
        } else if ($request->category_name) {
            $tag_id = Tag::where('name', $request->category_name)->get()->first()->tagid;
            $events = Event::where('tagid', $tag_id)->where('isprivate', false)->take(12)->get();
        }
        return Response($events);
    }
}
