<?php

namespace App\Http\Controllers;

class EventController extends Controller
{
    /**
     * Shows the about us page.
     * *********************************************
     * CHANGE THIS TO BE DYNAMIC, SHOULD RECEIVE AN eventID AND DISPLAY THAT ONE
     * *********************************************
     * @return Response
     */
    public function event()
    {
        return view('pages.event');
    }
}