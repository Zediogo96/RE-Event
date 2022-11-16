<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    use Notifiable;

    //Explicitly associate with table name
     protected $table = 'user_';
    //Force primary key
    protected $primaryKey = 'userid';
    // Don't add create and update timestamps in database.
    public $timestamps = false;

    //The attributes that are mass assignable
    protected $attr = [
        'name', 'email', 'birthDate', 'password', 'gender', 'profilePic', 'admin',
    ];

    //The attributes that should be hidden for arrays
    protected $hidden = [
        'password',
    ];

    public function hostedEvents()
    {
        return $this->belongsToMany('App\Models\Event', 'event_host', 'userid' , 'eventid');
    }

    /**
     * The events this user participates.
     */
    public function attendingEvents()
    {
        return $this->belongsToMany('App\Models\Event', 'ticket', 'userid', 'eventid');
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
