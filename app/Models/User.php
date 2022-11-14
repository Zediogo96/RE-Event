<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    // Don't add create and update timestamps in database.
    public $timestamps = false;

    protected $table = 'user_';

    protected $attr = [
        'name', 'email', 'password', 'birthDate', 'gender', 'profilePic',
    ];

    protected $hidden_attr = [
        'password',
    ];

    public function eventsHosting()
    {
    }

    public function eventsAttending()
    {
    }

    // CHECK AGAIN IF THIS IS THE INDENTED ROUTE /////////////////
    // REMOVE COMMENTS AFTER   ///////////////////////////////////
    //////////////////////////////////////////////////////////////
    public function login()
    {
        return redirect()->route('home');
    }

    public function logout()
    {
        return redirect()->route('home');
    }
    //////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////
}
