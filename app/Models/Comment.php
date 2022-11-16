<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    // Don't add create and update timestamps in database.
    public $timestamps  = false;
    //Explicitly associate with table name
    protected $table = 'comment';
    //Force primary key
    protected $primaryKey = 'commentid';

    /**
     * The event that the comment belongs to.
     */
    public function event()
    {
        return $this->belongsTo('App\Models\Event', 'eventid');
    }

    /**
     * The reports of the comment
     */
    public function reports()
    {
        return $this->hasMany('App\Models\Report', 'commentid');
    }
}
