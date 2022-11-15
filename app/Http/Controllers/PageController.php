<?php 

namespace App\Http\Controllers;


class PageController extends Controller
{
    /**
     * Shows the about us page.
     *
     * @return Response
     */
    public function aboutUs()
    {
        return view('pages.aboutUs');
    }

}