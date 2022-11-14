<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    // Don't add create and update timestamps in database.
    public $timestamps  = false;

    protected $table = 'event';

    /**
     * The city that the event belongs to.
     */
    public function city()
    {
        return $this->belongsTo('App\Models\City', 'cityID');
    }

    /**
     * The photos that belong to the event.
     */
    public function photos()
    {
        return $this->hasMany('App\Models\Photo');
    }

    /**
     * The tags that belong to the event.
     */
    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag', 'tagID');
    }

    /**
     * The country that the event belongs to.
     * !! DON'T KNOW IF THIS IS CORRECT !!
     */
    public function country()
    {
        return $this->belongsToThrough('App\Models\Country', 'App\Models\City', 'cityID', 'countryID');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment', 'eventID');
    }

    // public function atendees()
    // {

    // }
}
