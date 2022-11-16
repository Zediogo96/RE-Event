<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invited extends Model
{
    // Don't add create and update timestamps in database.
    public $timestamps  = false;
    //Explicitly associate with table name
    protected $table = 'invited';
    //Force primary key
    protected $primaryKey = ['userid','eventid'];
    //to check if a user is invited to an event, just check if a record in this table exists
}