<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Event;
use App\Models\Ticket;

use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('layouts.users', ['users' => $users]);
    }

    /**
     * Display the specified resource.
     * * @param  \App\Models\Event  $event
     * * @return \Illuminate\Http\Response
    **/
    public function show($id)
    {
        if (!Auth::check()) return redirect('/login');
        $user = User::find($id);
        $this->authorize('view', $user);
        return view('pages.userPage', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request)
    {   
        if (!Auth::check()) return redirect('/login');
        $user = User::find($request->input('userid'));
        $this->authorize('update', $user);

        if (!is_null($request->input('name'))) {
            $user->name = $request->input('name');
        }

        if (!is_null($request->input('email'))) {
            $user->email= $request->input('email');
        }

        if (!is_null($request->input('birthdate'))) {
            $user->birthdate = $request->input('birthdate');
        }

        if (!is_null($request->input('password'))) {
            $user->password = bcrypt($request->input('password'));
        }

        if (!is_null($request->input('gender'))) {
            $user->gender= $request->input('gender');
        }


        if ($request->hasFile('profilePic')) {

            $file = $request->file('profilePic');
            $filename = Auth::user()->userid . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/profile_pictures'), $filename);

        }

        $user->save();
        return redirect('/user' . $user->userid);
    }


     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
/*     public function create(Request $request)
    {
        if (!Auth::check()) return redirect('/login');
        return view('pages.createEvent');
    } */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!Auth::check()) return redirect('/login');
        //$user = User::find($request->input('userid'));
        $creating_user = Auth::user();
        // $this->authorize('create', $creating_user);
        $user = new User;

        if (!is_null($request->input('name'))) {
            $user->name = $request->input('name');
        }

        if (!is_null($request->input('email'))) {
            $user->email= $request->input('email');
        }

        if (!is_null($request->input('birthdate'))) {
            $user->birthdate = $request->input('birthdate');
        }

        if (!is_null($request->input('password'))) {
            $user->password = bcrypt($request->input('password'));
        }

        if (!is_null($request->input('gender'))) {
            $user->gender= $request->input('gender');
        }

        if ($request->hasFile('profilePic')) {

            $file = $request->file('profilePic');
            $filename = Auth::user()->userid . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/profile_pictures'), $filename);
        }

        $user->save();
    }


    public function attendEvent(Request $request) {
        if (!Auth::check()) return redirect('/login');
        $user = Auth::user();  //o user atual
        $event = Event::find($request->eventid);  //o evento que o user quer participar

        //autorizar se o evento for private ou se já estiver no evento
        // $this->authorize('attend', $event);

        //Se o authorize nao fizer sentido, passsar o codigo para aqui

        $user_ticket = new Ticket;
        $user_ticket->qr_genstring = '527b93cdc6fcf912f9d9e0f018ab784deb4dc672ac8b6e07fcd65ef7b00160ea';  //for testing
        $user_ticket->userid = $user->userid;
        $user_ticket->eventid = $event->eventid;
        $user_ticket->save();
    }

    public function leaveEvent(Request $request) {
        if (!Auth::check()) return redirect('/login');
        $user = Auth::user();  //o user atual
        $event = Event::find($request->eventid);  //o evento que o user quer deixar de participar

        //autorizar se o evento for private ou se já estiver no evento
        // $this->authorize('leave', $event);

        //Se o authorize nao fizer sentido, passsar o codigo para aqui
        
        $user_ticket = Ticket::where('userid', $user->userid)->where('eventid', $event->eventid);
        $user_ticket->delete();
    }

}
