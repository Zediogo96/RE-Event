<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    // Don't add create and update timestamps in database.
    public $timestamps  = false;
    //Explicitly associate with table name
    protected $table = 'event';
    //Force primary key
    protected $primaryKey = 'eventid';
    
    /**
     * The city that the event belongs to.
     */
    public function city()
    {
        return $this->hasOne('App\Models\City', 'cityid');
    }

    /**
     * The photos that belong to the event.
     */
    public function photos()
    {
        return $this->hasMany('App\Models\Photo', 'photoid');
    }

    /**
     * The tags that belong to the event.
     */
    public function tags()
    {
        return $this->hasMany('App\Models\Tag', 'tagid');
    }

    /**
     * The country that the event belongs to.
     * !! DON'T KNOW IF THIS IS CORRECT !!
     */
    public function country()
    {
        //return $this->belongsToThrough('App\Models\Country', 'App\Models\City', 'cityID', 'countryID');
        return $this->belongsTo('App\Models\Country', 'eventid');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment', 'eventID');
    }

    // public function atendees()
    // {

    // }
}
