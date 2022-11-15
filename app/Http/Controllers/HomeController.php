<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    /**
     * Shows the about us page.
     *
     * @return Response
     */
    public function home()
    {
        return view('pages.home');
    }
}
