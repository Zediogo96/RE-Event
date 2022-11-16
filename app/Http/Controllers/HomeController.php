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
        $events = Event::all();
        return view('pages.home',compact(['events'])); 

    }

    /**
     * Shows the login page.
     *
     * @return Response
     */
    public function login()
    {
        return view('pages.login');
    }

}
