<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

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
        $user = User::find($id);
        return view('pages.userPage', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {   
        $user = User::find($request->input('userid'));

        if (!is_null($request->input('name'))) {
            $user->name = $request->input('name');
        }

        if (!is_null($request->input('description'))) {
            $user->email= $request->input('email');
        }

        if (!is_null($request->input('birthday'))) {
            $user->birthDay = $request->input('birthday');
        }

        if (!is_null($request->input('password'))) {
            $user->capacity = bcrypt($request->input('password'));
        }
        $user->save();
        return redirect('/user' . $user->userid);
    }
}
