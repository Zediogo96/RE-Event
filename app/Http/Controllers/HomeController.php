<?php

namespace App\Http\Controllers;
use App\Models\Event;
use App\Models\Photo;

class HomeController extends Controller
{
    /**
     * Shows the about us page.
     *
     * @return Response
     */
    public function home()
    {
        $events = Event::where('isprivate', 0)->take(24)->get();
        return view('pages.home',compact(['events'])); 

    }

    /**
     * Shows the login page.
     *
     * @return Response
     */
    public function login()
    {
        return view('auth.login');
    }

}
